{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Belbin')
@section('content')
    <belbin_vue :projects="{{ json_encode($groupmembers) }}"></belbin_vue>
@endsection