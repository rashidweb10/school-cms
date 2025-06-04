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
        
        Mail::to(config('mail.from.address'))
            ->queue(new FormSubmissionMail($formName, $validatedData));
            

        // Mail::to(config('mail.from.address'))
        // ->send(new FormSubmissionMail($formName, $validatedData));        
            

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
