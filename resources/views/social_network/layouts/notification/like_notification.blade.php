<a href="{{ route('social_network_profile', ['id' => $notification->data['auth']['id']]) }}">
  <strong>{{ $notification->data['auth']['prenom'] }} {{ $notification->data['auth']['nom'] }}</strong> a aimé un de vos posts !
</a>
