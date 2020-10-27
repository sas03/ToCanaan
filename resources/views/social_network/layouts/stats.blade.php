@if ($user->id == Auth::id())
  <a class="link-stats" href="{{ route('social_network_index', ['id' => $user->id]) }}">
@else
  <a class="link-stats" href="{{ route('social_network_profile', ['id' => $user->id]) }}">
@endif
  <span class="stats stats-posts bg-jaune">{{ $nbrOfPosts }}</span>
  Posts
</a>

<a class="link-stats" href="{{ route('social_network_following', ['id' => $user->id]) }}">
  <span class="stats bg-vert">{{ count($following) }}</span>
  Abonnements
</a>

<a class="link-stats" href="{{ route('social_network_followers', ['id' => $user->id]) }}">
  <span class="stats bg-violet">{{ count($followers) }}</span>
  Abonnés
</a>

<a class="link-stats" href="{{ route('social_network_likes', ['id' => $user->id]) }}">
  <span class="stats stats-likes bg-rose">{{ count($user->likes) }}</span>
  J'aime
</a>
