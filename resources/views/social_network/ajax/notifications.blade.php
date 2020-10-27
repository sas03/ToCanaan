@if (count(Auth::user()->unreadNotifications) > 0)

  @foreach (Auth::user()->unreadNotifications as $notification)
    <li>
      @include('social_network.layouts.notification.'.snake_case(class_basename($notification->type)))
    </li>

    @if (!$loop->last)
      <hr class="bg-blanc">
    @endif
  @endforeach

@else
  <li><a href="#">Pas de notifications.</a></li>
@endif
