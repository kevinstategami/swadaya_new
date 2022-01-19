@extends('layouts.app')
@section('content')
	@include('homepage.comp.introduction')
    @include('homepage.comp.progress')
    @include('homepage.comp.jenis')
    @include('homepage.comp.about-us')
    @include('homepage.comp.visi-misi')
    @include('homepage.comp.teams')

    <!-- MODAL -->
    @include('homepage.comp.modal.cms.secara-umum')
    @include('homepage.comp.modal.cms.jenis-koperasi')
    @include('homepage.comp.modal.cms.introduction')
    @include('homepage.comp.modal.cms.about-us')
@endsection
@section('script')
	@include('homepage.comp.script.script-introduction')
	@include('homepage.comp.script.script-progress')
	@include('homepage.comp.script.script-jenis-koperasi')
    @include('homepage.comp.script.script-about-us')
@endsection