@extends('layouts.app')
@section('content')
    @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
        <a href="javascript:void(0)" class="button button-pasific button-lg hover-ripple-out animated btn-add-block" style="z-index: 999" onclick="addBlock('homepage')">Add Block</a>
    @endif

    @include('block.layout-block')
@endsection
@section('script')
	@include('homepage.comp.script.script-introduction')
	@include('homepage.comp.script.script-progress')
	@include('homepage.comp.script.script-jenis-koperasi')
    @include('homepage.comp.script.script-about-us')
@endsection