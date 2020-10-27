@component('mail::message')

Voici un email de la part de :<br/>

Nom : {{ $data['nom'] }}<br/>
Prénom : {{ $data['prenom'] }}<br/>
Email : {{ $data['email'] }}<br/>

Message : 

{{ $data['message'] }}

{{ config('app.name') }}
@endcomponent
