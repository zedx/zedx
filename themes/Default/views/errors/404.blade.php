@extends('frontend::errors.layout')
@section('error')
404
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1>Oops !</h1>
            <h2>{!! trans('frontend.page.page_not_found_title') !!}</h2>
            <div class="error-details">
                {!! trans('frontend.page.page_not_found_text') !!}
            </div>
            <div class="error-actions">
                <a href="{{ url("") }}" class="btn btn-secondary"><i class="fa fa-home"></i> {!! trans('frontend.page.back_home') !!}</a>
            </div>
        </div>
    </div>
</div>
@endsection
