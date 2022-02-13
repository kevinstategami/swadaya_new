@extends('layouts.app')
@section('content')
	@if(!Auth::guest() && Auth::user()->edit_mode)
        <a href="javascript:void(0)" class="button button-pasific button-lg hover-ripple-out animated btn-add-block" style="z-index: 999" onclick="addBlock('about-us')">Add Block</a>
    @endif

    @include('block.layout-block')

	
@endsection
@section('script')
	@include('about-us.comp.script.script-fungsi-peran')
	@include('about-us.comp.script.script-introduction')
@endsection