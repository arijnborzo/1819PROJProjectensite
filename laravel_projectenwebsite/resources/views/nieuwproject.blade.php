{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'NewProject')
@section('content')
    <newproject_vue></newproject_vue>
{{--    <newproject_vue :projects="{{ $projects }}"></newproject_vue>--}}
@endsection
