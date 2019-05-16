{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Mijn Project')
@section('content')
{{--@if()--}}
{{--    <mijnproject_vue></mijnproject_vue>--}}
{{--    @else--}}
    <details_vue></details_vue>
{{--    @endif--}}
@endsection