<ul>
  @if (Auth::id() == $user->id)
    <a href="{{ route('social_network_index', ['id' => $user->id]) }}">
      <li @if (\Route::current()->getName() == 'social_network_index') class="active" @endif>Dashboard</li>
    </a>
    <a href="{{ route('social_network_wall', ['id' => $user->id]) }}">
      <li @if (\Route::current()->getName() == 'social_network_wall') class="active" @endif>Mur</li>
    </a>
  @else
    <a href="{{ route('social_network_profile', ['id' => $user->id]) }}">
      <li @if (\Route::current()->getName() == 'social_network_profile') class="active" @endif>Profil</li>
    </a>
  @endif
  <a href="{{ route('social_network_resume', ['id' => $user->id]) }}">
    <li @if (\Route::current()->getName() == 'social_network_resume') class="active" @endif>FORME</li>
  </a>
  <a href="{{ route('social_network_groupes', ['id' => $user->id]) }}">
    <li @if (\Route::current()->getName() == 'social_network_groupes') class="active" @endif>Groupes</li>
  </a>
  @if (Auth::id() == $user->id)
    <a href="{{ route('social_network_messages_auth', ['id' => $user->id]) }}">
      <li @if (\Route::current()->getName() == 'social_network_messages') class="active" @endif>Messages</li>
    </a>
  @else
    <a href="{{ route('social_network_messages', ['id' => $user->id]) }}">
      <li @if (\Route::current()->getName() == 'social_network_messages') class="active" @endif>Messages</li>
    </a>
  @endif
</ul>
