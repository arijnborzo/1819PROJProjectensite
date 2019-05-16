{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Overzicht')
@section('content')
	@if($archief == false)
		<overzicht_vue :projects="{{ $projects }}"></overzicht_vue>
	@else
		<archief_vue :projects="{{ $projects }}"></archief_vue>
	@endif
{{--	<overzicht_vue :archief="{{ $archief }}"></overzicht_vue>--}}
@endsection