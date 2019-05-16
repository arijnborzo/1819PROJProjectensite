{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Overzicht')
@section('content')
	<overzicht_vue :projects="{{ $projects }}"></overzicht_vue>
@endsection