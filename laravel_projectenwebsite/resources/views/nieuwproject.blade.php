{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'NewProject')
@section('content')
    <newproject_vue :project="{{ $project }}" :teachers="{{ $teachers }}"></newproject_vue>
@endsection
