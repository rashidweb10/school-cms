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

        $generalEnquiry = $company->meta->where('meta_key', 'general_enquiry')->first()->meta_value ?? config('mail.from.address');
        $admissionEnquiry = $company->meta->where('meta_key', 'admission_enquiry')->first()->meta_value ?? config('mail.from.address');

        // Determine recipient email
        $recipientEmail = ($request->filled('enquiry_type') && $request->input('enquiry_type') === 'Admission')
            ? $admissionEnquiry
            : $generalEnquiry;        
        
        // Mail::to(config('mail.from.address'))
        //     ->queue(new FormSubmissionMail($formName, $validatedData));

        $recipientEmail = [$recipientEmail, 'enquiry@newhorizonsms.org'];
        $recipientEmail = ['enquiry@newhorizonsms.org'];
            
        try {
            Mail::to($recipientEmail)
                ->send(new FormSubmissionMail($formName, $validatedData));
            logger('Mail sent successfully to: ' . json_encode($recipientEmail));
        } catch (\Exception $e) {
            logger('Mail send failed: ' . $e->getMessage());
            dd($e->getMessage()); // or return response()->json(['error' => $e->getMessage()]);
        }    
        
        //eduprint API
        $student = [
            "ShortName"        => $request->input('school_short_name'),
            "Description"      => now()->month >= 4 ? now()->year . '-' . (now()->year + 1) : (now()->year - 1) . '-' . now()->year,
            "ChildFirstName"   => $request->input('child_first_name'),
            "ChildMiddleName"  => $request->input('child_middle_name'),
            "ChildLastName"    => $request->input('child_last_name'),
            "ContactEmailID"   => $request->input('email'),
            "ContactMobileNo"  => $request->input('phone'),
            "DOB"              => "1970-01-01 00:00:00",
            "ClassMasterID"    => $request->input('class_id'),
            "EnquiryChannelID" => $request->input('enquiry_channel_id'),
            "GenderID"         => 3,
            "UtmSource"        => "",
            "UtmMedium"        => "",
            "UtmCampaign"      => "",
            "UtmTerm"          => "",
            "UtmContent"       =>""
        ];  
        
        $eduResponse = create_student_enquiry($student);

        $form->update([
            'edu_response' => $eduResponse,
        ]);        

        return redirect()->back()->with('success', 'Enquiry submitted successfully');
    }

    private function getValidationRules($formName)
    {
        switch ($formName) {
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
                    'child_middle_name' => 'required|string|max:50',
                    'child_last_name' => 'required|string|max:50',                 
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
            default:
                return [
                    'form_name' => 'required|max:20',
                ];
        }
    }
}