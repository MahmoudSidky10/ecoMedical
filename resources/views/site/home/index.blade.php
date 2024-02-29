@extends('site.layout.index')
@section('body-class',"home")
@section('content')

    @includeIf("site.home.layout.slider")
    @includeIf("site.home.layout.top-selling")
    @includeIf("site.home.layout.top-brands")
    @includeIf("site.home.layout.top-categories")
    @foreach($homeSections as $item)
        @includeIf("site.home.layout.sections")
    @endforeach
    @includeIf("site.home.layout.deals")
    @includeIf("site.home.layout.our-clients")
    @includeIf("site.home.layout.recent-views")



@endsection













