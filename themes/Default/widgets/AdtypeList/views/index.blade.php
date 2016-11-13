<div class="panel panel-default">
  <div class="panel-body">

    <table class="table reverseTable">
      <tr>
        <td>&nbsp;</td>
        <td>{!! trans('frontend.user.adtype.headline_ad') !!}</td>
        <td>{!! trans('frontend.user.adtype.renew_an_ad') !!}</td>
        <td>{!! trans('frontend.user.adtype.edit_an_ad') !!}</td>

        <td>{!! trans('frontend.user.adtype.add_photos') !!}</td>
        <td>{!! trans('frontend.user.adtype.photos_peer_ad') !!}</td>
        <td>{!! trans('frontend.user.adtype.update_photos') !!}</td>

        <td>{!! trans('frontend.user.adtype.add_videos') !!}</td>
        <td>{!! trans('frontend.user.adtype.videos_peer_ad') !!}</td>
        <td>{!! trans('frontend.user.adtype.update_videos') !!}</td>

        <td>{!! trans('frontend.user.adtype.display_time_of_an_ad') !!}</td>
        <td>{!! trans('frontend.user.adtype.remaining_ads') !!}</td>
        <td class="vcenter">{!! trans('frontend.user.adtype.ad_price') !!}</td>
        <td>&nbsp;</td>
      </tr>
      @foreach ($adtypes as $adtype)
      <tr>
        <td><h4>{{ $adtype->title }}</h4></td>
        <td>@if ($adtype->is_headline) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>
        <td>@if ($adtype->can_renew) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>
        <td>@if ($adtype->can_edit) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>
        <td>@if ($adtype->can_add_pic) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>

        <td>@if ($adtype->nbr_pic >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.adtype.unlimited')) !!}</span> @elseif ($adtype->nbr_pic == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b>{{ $adtype->nbr_pic }}</b> @endif</td>

        <td>@if ($adtype->can_update_pic) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>
        <td>@if ($adtype->can_add_video) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>

        <td>@if ($adtype->nbr_video >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.adtype.unlimited')) !!}</span> @elseif ($adtype->nbr_video == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b>{{ $adtype->nbr_video }}</b> @endif</td>

        <td>@if ($adtype->can_update_video) <i class="fa fa-check-circle-o fa-lg text-success"></i> @else <i class="fa fa-times-circle-o fa-lg text-danger"></i> @endif</td>

        <td>@if ($adtype->nbr_days >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.adtype.unlimited')) !!}</span> @elseif ($adtype->nbr_days == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b><span class="text-info">{!! trans_choice('frontend.user.adtype.nbr_days', $adtype->nbr_days) !!}</span></b> @endif</td>

        <td>@if ($adtype->price == 0) <i class="fa fa-check-circle-o fa-lg text-success"></i> @elseif ($numbers[$adtype->id] >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.adtype.unlimited')) !!}</span> @elseif ($numbers[$adtype->id] <= 0) <b><span class="text-danger"> 0 </span></b> @else <b><span class="text-success">{{ $numbers[$adtype->id] }}</span></b> @endif</td>

        <td>
        @if ($adtype->price > 0)
          @if ($numbers[$adtype->id] > 0)
          <del><h3>{{ number_format($adtype->price, 2 , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }} {{ $currency }}</h3></del>
          @else
          <h3>{{ number_format($adtype->price, 2 , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }} {{ $currency }}</h3>
          @endif
        @else
          <h3 class="text-success">{!! mb_strtoupper(trans('frontend.user.adtype.free')) !!}</h3>
        @endif
        </td>
        <td>
          @if ($numbers[$adtype->id] > 0 || $adtype->price == 0)
            <a href="{!! route('user.ad.create', $adtype->id) !!}" class="btn btn-secondary"><i class="fa fa-plus"></i> {!! trans('frontend.user.adtype.add') !!}</a>
          @else
            <a href="{{ route('user.adtype.cart', $adtype->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {!! trans('frontend.user.adtype.purchase') !!}</a>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
