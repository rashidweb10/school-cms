{{-- resources/views/emails/form_submission.blade.php --}}

@component('mail::message')
# {{ ucfirst($formName) }} Form Submission

@foreach($data as $key => $value)
@if($key === 'resume')
**{{ ucwords(str_replace('_', ' ', $key)) }}:** <a href="{{ asset('storage/' . $value) }}" style="display:inline-block;padding:8px 16px;background-color:#007bff;color:#ffffff;text-decoration:none;border-radius:4px;">Download CV</a>

@else
**{{ ucwords(str_replace('_', ' ', $key)) }}:** {{ $value }}

@endif
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent