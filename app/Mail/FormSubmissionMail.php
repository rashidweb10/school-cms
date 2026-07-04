<?php

// app/Mail/FormSubmissionMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

//class FormSubmissionMail extends Mailable implements ShouldQueue
class FormSubmissionMail extends Mailable
{
    //use Queueable, SerializesModels;
    use SerializesModels;

    public $formName;
    public $data;

    public function __construct($formName, $data)
    {
        $this->formName = $formName;
        $this->data = $data;
    }

    public function build()
    {

    // Default subject
    $subject = 'New Enquiry Submission | ' . config('custom.app_name');

    // Custom subject for Career form
    if ($this->formName === 'career') {
        $name = $this->data['name'] ?? 'Candidate';
        $jobCode = $this->data['job_code'] ?? 'N/A';

        $subject = 'New Career Application Submission | ' . config('custom.app_name') . ' | ' . $name . ' (Job Code: ' . $jobCode . ')';
    }    
        return $this->subject($subject)
                    ->markdown('emails.form_submission');
    }
}