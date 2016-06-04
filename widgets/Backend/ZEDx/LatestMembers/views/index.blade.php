@section('css')
<link rel="stylesheet" href="{{ public_asset('widgets/backend/zedx/latestmembers/avatar.css') }}">
@append
<ul class="users-list clearfix">
  @foreach ($users as $user)
  <li>
    @if ($user->avatar != '')
    <img src="{{ image_route('avatar', $user->avatar) }}" class="user-avatar">
    @else
    <div class="avatar-circle">
      <span class="initials">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
    </div>
    @endif
    <a class="users-list-name" href="#"> {{ $user->name }}</a>
    <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
  </li>
  @endforeach
</ul>
