<ol class="breadcrumb">
  <li><a href="{{ route('ad.search') }}">{!! trans('frontend.ad.all_ads') !!}</a></li>
  @foreach($ad->category->getAncestorsAndSelf() as $category)
    <li><a href="{{ route('ad.search', str_slug($category->name, '-').'?c='.$category->id) }}">{{ $category->name }}</a></li>
  @endforeach
</ol>
