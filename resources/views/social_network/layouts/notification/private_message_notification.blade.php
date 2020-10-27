<a href="{{ route('social_network_messages', ['id' => $notification->data['sender']['id']]) }}">
  <strong>{{ $notification->data['sender']['prenom'] }} {{ $notification->data['sender']['nom'] }}</strong> vous a envoyé un message privé !
</a>
