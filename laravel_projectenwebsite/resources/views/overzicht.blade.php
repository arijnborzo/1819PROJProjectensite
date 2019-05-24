{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Overzicht')
@section('content')
	@if(!$archief)
		<overzicht_vue :groupmembers="{{ json_encode($groupmembers) }}" :projects="{{ $projects }}"></overzicht_vue>
	@else
		<archief_vue :groupmembers="{{ json_encode($groupmembers) }}" :projects="{{ $projects }}"></archief_vue>
	@endif
@endsection
