{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'NewProject')
@section('content')
    <newproject_vue :project="{{ $project }}" :teachers="{{ json_encode($teachers) }}" :crsf-token="{{ json_encode(csrf_token()) }}" :smartcriteria="{{ $smartcriteria }}"></newproject_vue>
@endsection
