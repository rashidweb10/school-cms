{{-- resources/views/emails/form_submission.blade.php --}}

@component('mail::message')
# {{ ucfirst($formName) }} Form Submission

@foreach($data as $key => $value)
**{{ ucfirst($key) }}:** {{ $value }}

@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent