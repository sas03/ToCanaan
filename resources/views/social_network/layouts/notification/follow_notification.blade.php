<a href="{{ route('social_network_profile', ['id' => $notification->data['user']['id']]) }}">
  <strong>{{ $notification->data['user']['prenom'] }} {{ $notification->data['user']['nom'] }}</strong> vous suit !
</a>
