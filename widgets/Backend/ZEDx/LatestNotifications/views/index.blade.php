<ul class="timeline">
  @foreach ($notifications as $notification)
    @if ($notification->actor_role == 'root')
    {{--*/ $actorName = "<a href='" . route("zxadmin.admin.edit", $notification->actor_id) . "' class='text-red'><i class='fa fa-user-secret'></i> " . $notification->actor_name . "</a>" /*--}}
    @elseif ($notification->actor_role == 'user')
    {{--*/ $actorName = "<a href='" . route("zxadmin.user.edit", $notification->actor_id) . "'><i class='fa fa-user'></i> " . $notification->actor_name . "</a>" /*--}}
    @elseif ($notification->actor_role == 'system')
    {{--*/ $actorName = "<a href='#' class = 'text-green'>[ " . $notification->actor_name . " ]</a>" /*--}}
    @endif

    @include("backend::notification._partials.timeline.{$notification->type}", ['actorName' => $actorName])
  @endforeach

</ul>
