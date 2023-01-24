@component('mail::message')
# You got mail

Hoi Jan Peter,
Je hebt een nieuwe mail ontvangen van {{ $full_name  }} met email adres
<a href="mailto:{{ $email_address }}">{{ $email_address }}</a>.

<p style="padding: 1rem; background-color:lightgray; color: black">
    {{ $message }}
</p>

Bedankt,<br>
{{ config('app.name') }}
@endcomponent
