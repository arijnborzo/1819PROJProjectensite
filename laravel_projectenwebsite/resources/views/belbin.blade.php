{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Belbin')
@section('content')
    <belbin_vue :belbin_type="{{ json_encode($belbintype) }}" :projects="{{ json_encode($groupmembers) }}"></belbin_vue>
@endsection