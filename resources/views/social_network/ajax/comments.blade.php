@if (count($comments) > 0)
  @foreach ($comments as $comment)
    <a href="{{ route('social_network_profile', ['id' => $comment->user->id]) }}" class="link-avatar-user">
      <img src="{{ asset('img/avatars/' . $comment->user->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
    </a>
    <p>
      <span>
        <a href="{{ route('social_network_profile', ['id' => $comment->user->id]) }}">{{ ucfirst($comment->user->prenom) }} {{mb_strtoupper($comment->user->nom) }}</a> - <em>{{ $comment->created_at->diffForHumans() }}</em>
      </span>
      <br>
      {{ $comment->comment }}
    </p>

    <hr class="bg-blanc">
  @endforeach
@else
  <p>Aucuns commentaires.</p>
@endif
