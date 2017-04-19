<style>
.zedx-categories-widget .single {
    padding: 30px 15px;
}
.zedx-categories-widget .single h3.side-title {
    margin: 0;
    margin-bottom: 10px;
    padding: 0;
    font-size: 20px;
    text-transform: uppercase;
}
.zedx-categories-widget .single h3.side-title:after {
    content: '';
    width: 60px;
    height: 1px;
    background: #18bc9c;
    display: block;
    margin-top: 6px;
}
.zedx-categories-widget .single ul {
    margin-bottom: 0;
}
.zedx-categories-widget .single li a {
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
    border-bottom: 1px solid #f0f0f0;
    line-height: 40px;
    display: block;
    text-decoration: none;
}
.zedx-categories-widget .single li a:hover {
    color: #18bc9c;
}
.zedx-categories-widget .single li:last-child a {
    border-bottom: 0;
}
</style>
@if (\ZEDx\Models\Category::roots()->count() > 1)
<div class="top-buffer zedx-categories-widget">
    <div class="panel panel-default">
        <div class="panel-body">
        @foreach (\ZEDx\Models\Category::roots()->get()->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $root)
                    <div class="col-md-3">
                        <div class="single category">
                            <h3 class="side-title">
                            @if ($root->thumbnail)
                                <img class="img-rounded" width="55" src="{{ image_route('root', $root->thumbnail) }}" />
                            @endif
                            {{ $root->name }}
                            </h3>
                            <ul class="list-unstyled">
                                @foreach($root->getLeaves() as $category)
                                    <li>
                                        @if ($category->thumbnail)
                                        <img class="img-rounded" width="55" src="{{ image_route('category', $category->thumbnail) }}" />
                                        @endif
                                        <a href="{{ route('ad.search', str_slug($category->name, '-').'?c='.$category->id) }}">{{ $category->name }} <span class="pull-right"><span class="badge">{{ $category->ads->count() }}</span></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        </div>
    </div>
</div>
@endif
