{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Mijn Project')
@section('content')
  @if($belongstoproject)
    <mijnproject_vue :project="{{ $project[0] }}" :creator="{{ $creator }}" :teacher="{{ $teacher }}" :groupmembers="{{ $groupmembers }}" :Smartcriteria="{{ $projectsmartcriteria }}"></mijnproject_vue>
  @else
    <details_vue :project="{{ $project[0] }}" :creator="{{ $creator }}" :teacher="{{ $teacher }}" :groupmembers="{{ $groupmembers }}" :Smartcriteria="{{ $projectsmartcriteria }}"></details_vue>
  @endif

@endsection
