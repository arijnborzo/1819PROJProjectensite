{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Student')
@section('content')
{{-- <studenten_vue :studenten="'{!! json_encode($students) !!}'"></studenten_vue>--}}
    <studenten_vue :students="{{ $students }}"></studenten_vue>
@endsection