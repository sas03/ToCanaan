@component('mail::message')

Bienvenue sur la plateforme ToCanaan {{ $user->prenom }} {{ $user->nom }} !

Votre inscription a bien été prise en compte !

Nous vous souhaitons un agréable surf !

@component('mail::button', ['url' => config('app.url') ])
ToCanaan.com
@endcomponent

A très vite ;-)<br>
L'équipe de {{ config('app.name') }}
@endcomponent
