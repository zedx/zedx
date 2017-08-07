<link rel="stylesheet" href="{{ public_asset('widgets/frontend/theme/usercontact/avatar.css') }}">
<ul class="list-group">
  <li class="list-group-item text-center">
    <div class="item-user-avatar text-center">
      @if ($ad->user->avatar != '')
      <img src="{{ image_route('avatar', $ad->user->avatar) }}" class="img-circle user-avatar">
      @else
      <div class="avatar-circle">
        <span class="initials">{{ strtoupper(substr($ad->user->name, 0, 1)) }}</span>
      </div>
      @endif
    </div>
  </li>
  <li class="list-group-item text-center item-user-name">
    <h4>{{ $ad->user->name }}</h4>
  </li>
  <li class="list-group-item text-center">
  @if ($ad->user->is_phone)
    <a href="javascript:void(0)" class="btn btn-md btn-secondary btn-block" id="showPhoneNumber" data-url='{{ route("ad.phone", [$ad->id]) }}'>
      <i class="fa fa-phone pull-left"></i> {!! trans('frontend.ad.show_phone_number') !!}
    </a>
  @endif
    <a href="#" class="btn btn-md btn-primary btn-block" data-toggle="modal" data-target="#contactAction">
      <i class="fa fa-envelope pull-left"></i> {!! trans('frontend.ad.contact.contact_announcer') !!}
    </a>
  </li>
</ul>
@include('widget_frontend_theme_usercontact::modals.contact')
