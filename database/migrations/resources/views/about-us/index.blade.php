@extends('layouts.app')
@section('content')
	@include('about-us.comp.introduction')
	@include('about-us.comp.section1')

	<!-- MODAL -->
	@include('about-us.comp.modal.cms.fungsi-peran')
	@include('about-us.comp.modal.cms.image-about-us')
	@include('about-us.comp.modal.cms.introduction')
@endsection
@section('script')
	@include('about-us.comp.script.script-fungsi-peran')
	@include('about-us.comp.script.script-introduction')
@endsection