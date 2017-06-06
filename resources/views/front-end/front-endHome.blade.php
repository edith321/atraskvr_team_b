@extends('front-end.front-endCore')

@section('homepage')
    <div id="part-01">
        <div id="red-flag">
            <div id="elektromarkt">{{trans('app.inspired_by')}}</div>
        </div>
        <div id="main-title">{{trans('app.main_title')}}</div>
        <div id="banner-text">{{trans('app.banner-text')}}</div>
    </div>
    <div id="about">
        <div><img style="width: 200px;" src="{{$about['cover_images']['path']}}"></div>
        <h1>{{$about['translation']['title']}}</h1>
        <p>{{$about['translation']['description_long']}}</p>
    </div>
@endsection