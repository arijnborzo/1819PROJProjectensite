{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Mijn Project')
@section('content')
  @if($belongstoproject)
    <mijnproject_vue :project="{{ $project }}" :creator="{{ $creator }}" :teacher="{{ $teacher }}"></mijnproject_vue>
  @else
    <details_vue :project="{{ $project }}" :creator="{{ $creator }}" :teacher="{{ $teacher }}"></details_vue>
  @endif

@endsection
