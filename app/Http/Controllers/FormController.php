<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Mail\FormSubmissionMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        //return $request->all();
        $formName = $request->input('form_name');

        $validationRules = $this->getValidationRules($formName);
        $validatedData = $request->validate($validationRules);
        // Handle file upload for resume if present
        if ($request->hasFile('resume')) {
            //$resumePath = $request->file('resume')->store('uploads/resumes', 'public');
            $schoolId = 's' . config('custom.school_id');
            $resumePath = $request->file('resume')->store('uploads/resumes/'.$schoolId.'/'.date("Y").'/'.date("m"), 'public'); 
            // Store the public URL or relative path
            $validatedData['resume'] = $resumePath;
        }

        $formData = collect($validatedData)->except(['form_name', 'name', 'email', 'phone'])->toArray();

        $companyId = $request->input('company_id') ?? config('custom.school_id');

        $form = Form::create([
            'form_name' => $formName,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'form_data' => $formData,
            'ip' => request()->ip(),
            'company_id' => $companyId //config('custom.school_id'),
        ]);

        $company = Company::with(['meta' => function ($q) {
            $q->whereIn('meta_key', ['general_enquiry', 'admission_enquiry']);
        }])->where('id', $companyId)->first();

        //$generalEnquiry = $company->meta->where('meta_key', 'general_enquiry')->first()->meta_value ?? config('mail.from.address');
        //$admissionEnquiry = $company->meta->where('meta_key', 'admission_enquiry')->first()->meta_value ?? config('mail.from.address');

        // Determine recipient email
        // $recipientEmail = ($request->filled('enquiry_type') && $request->input('enquiry_type') === 'Admission')
        //     ? $admissionEnquiry
        //     : $generalEnquiry;        
        
        // Mail::to(config('mail.from.address'))
        //     ->queue(new FormSubmissionMail($formName, $validatedData));

        //$recipientEmail = [$recipientEmail, 'enquiry@newhorizonsms.org'];
        $recipientEmail = ['enquiry@newhorizonsms.org']; //enquiry@newhorizonsms.org test.mail@newhorizonsms.org

        if($formName == 'career') {
            $recipientEmail = ['hr@newhorizonsms.com']; //hr@newhorizonsms.org test.mail@newhorizonsms.org

        }
            
        try {
            Mail::to($recipientEmail)
                ->send(new FormSubmissionMail($formName, $validatedData));
            logger('Mail sent successfully to: ' . json_encode($recipientEmail));
        } catch (\Exception $e) {
            logger('Mail send failed: ' . $e->getMessage());
            dd($e->getMessage()); // or return response()->json(['error' => $e->getMessage()]);
        }    
        
 
        
        if ($request->input('form_name') === 'landing') {

            //eduprint API
            $student = [
                "ShortName"        => $request->input('school_short_name'),
                "Description"      => $request->input('academic_year'), //now()->month >= 4 ? now()->year . '-' . (now()->year + 1) : (now()->year - 1) . '-' . now()->year,
                "ChildFirstName"   => $request->input('child_first_name'),
                "ChildMiddleName"  => $request->input('child_middle_name'),
                "ChildLastName"    => $request->input('child_last_name'),
                "ContactEmailID"   => $request->input('email'),
                "ContactMobileNo"  => $request->input('phone'),
                "DOB"              => "1970-01-01 00:00:00",
                "ClassMasterID"    => $request->input('class_id'),
                "EnquiryChannelID" => $request->input('enquiry_channel_id'),
                "GenderID"         => 3,
                "UtmSource"        => $request->filled('utm_source') ? $request->input('utm_source') : 'website',
                "UtmMedium"        => "",
                "UtmCampaign"      => "",
                "UtmTerm"          => "",
                "UtmContent"       =>""
            ];  
            
            $eduResponse = create_student_enquiry($student);

            $form->update([
                'edu_response' => $eduResponse,
            ]); 

            return redirect()->route('thankyou', [
                'name' => $request->input('name') // pass name to thank-you page
            ]);
        }

        if ($formName === 'referral') {
            $student = $this->buildReferralCrmPayload($validatedData);
            $eduResponse = $student ? create_student_enquiry($student) : false;

            $form->update([
                'edu_response' => $eduResponse,
            ]);

            logger('Referral CRM submission completed.', [
                'form_id' => $form->id,
                'crm_success' => $eduResponse !== false,
            ]);
        }

        return redirect()->back()->with('success', 'Enquiry submitted successfully');
    }

    /**
     * Build the exact EduSprint enquiry shape used by the landing form.
     *
     * The CRM IDs are resolved on the server from the EduSprint school export;
     * request-provided IDs are never accepted from the browser.
     */
    private function buildReferralCrmPayload(array $data): ?array
    {
        $schools = data_get(get_school_export_data(), 'SchoolGroupList.0.SchoolList', []);
        $school = collect($schools)->first(
            fn ($school) => ($school['SchoolName'] ?? null) === $data['referred_child_school']
        );

        if (!$school) {
            logger()->warning('Referral CRM payload could not be created: school not found.', [
                'school' => $data['referred_child_school'],
            ]);

            return null;
        }

        $schoolClass = collect($school['ClassList'] ?? [])->first(
            fn ($class) => ($class['ClassName'] ?? null) === $data['referred_child_grade']
        );
        $onlineChannel = collect($school['EnquiryChannel'] ?? [])->first(
            fn ($channel) => ($channel['EnquiryChannelName'] ?? null) === 'Online'
        );

        if (!$schoolClass || !$onlineChannel) {
            logger()->warning('Referral CRM payload could not be created: standard or Online channel not found.', [
                'school' => $data['referred_child_school'],
                'standard' => $data['referred_child_grade'],
            ]);

            return null;
        }

        $nameParts = preg_split('/\s+/', trim($data['referred_child_name']), -1, PREG_SPLIT_NO_EMPTY);
        $firstName = array_shift($nameParts);
        $lastName = count($nameParts) ? array_pop($nameParts) : '';

        return [
            'ShortName' => $school['ShortName'],
            'Description' => get_setting('admission_year'),
            'ChildFirstName' => $firstName,
            'ChildMiddleName' => implode(' ', $nameParts),
            'ChildLastName' => $lastName,
            'ContactEmailID' => $data['parent_email'],
            'ContactMobileNo' => $data['parent_phone'],
            'DOB' => '1970-01-01 00:00:00',
            'ClassMasterID' => $schoolClass['ClassMasterID'],
            'EnquiryChannelID' => $onlineChannel['EnquiryChannelID'],
            'GenderID' => 3,
            'UtmSource' => 'parent-referral',
            'UtmMedium' => 'website',
            'UtmCampaign' => 'parent-referral',
            'UtmTerm' => '',
            // EduSprint's enquiry API does not expose dedicated referral
            // fields. Keep the remaining referral details with the CRM lead
            // in its supported UTM content field.
            'UtmContent' => implode(' | ', [
                'Existing student: ' . $data['name'],
                'Email: ' . $data['email'],
                'Phone: ' . $data['phone'],
                'School: ' . $data['existing_student_school'],
                'Grade: ' . $data['existing_student_grade'],
                'Referred parent: ' . $data['parent_name'],
            ]),
        ];
    }

    private function getValidationRules($formName)
    {
        switch ($formName) {
            case 'career':
                return [
                    'form_name' => 'required|max:20',
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|max:50',
                    'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // max 2MB
                    'job_code' => 'required|string|max:200',
                    'industry' => 'required|string|max:500',
                    'category' => 'nullable|string|max:100',
                    //'job_type' => 'required|string|max:50',
                    //'contact_number' => 'nullable|string|max:50',
                    //'counselor_email_id' => 'nullable|string|max:50',
                    // optional extra fields can be added here
                ];
            case 'landing':
                return [
                    'form_name' => 'required|max:20',
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|max:50',
                    'phone' => 'nullable|digits_between:10,15|max:15',                    
                    'standard' => 'nullable|string|max:50',                    
                    'city' => 'nullable|string|max:50',                    
                    'school' => 'nullable|string|max:100',                    
                    'enquiry_type' => 'nullable|string|max:20',   
                    'child_first_name' => 'required|string|max:50',
                    'child_middle_name' => 'max:50',
                    'child_last_name' => 'required|string|max:50',                 
                    'academic_year' => 'required|string|max:20',                 
                    'utm_source' => 'nullable|string|max:100',
                ];
            case 'contact':
                return [
                    'form_name' => 'required|max:20',
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|max:50',
                    'phone' => 'nullable|digits_between:10,15|max:50',
                    'subject' => 'nullable|string|max:100',
                    'message' => 'required|string|max:150',
                    'enquiry_type' => 'nullable|string|max:20',
                ];
            case 'referral':
                return [
                    'form_name' => 'required|in:referral',
                    // These three values are intentionally the common form
                    // fields and are stored in the forms table columns.
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|max:50',
                    'phone' => 'required|digits_between:10,15|max:15',
                    // All referral-specific details are stored in form_data.
                    'existing_student_school' => 'required|string|max:150',
                    'existing_student_grade' => 'required|string|max:50',
                    'referred_child_name' => 'required|string|max:100',
                    'referred_child_school' => 'required|string|max:150',
                    'referred_child_grade' => 'required|string|max:50',
                    'parent_name' => 'required|string|max:50',
                    'parent_email' => 'required|email|max:50',
                    'parent_phone' => 'required|digits_between:10,15|max:15',
                ];
            default:
                return [
                    'form_name' => 'required|max:20',
                ];
        }
    }
}
