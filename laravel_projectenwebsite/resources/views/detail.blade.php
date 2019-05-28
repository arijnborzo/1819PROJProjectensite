{{-- extend the parent tpl--}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl--}}
@section('name', 'Mijn Project')
@section('content')
  @if($belongstoproject)
    <mijnproject_vue :is_student="{{ $isStudent }}" :project="{{ $project }}" :teacher="{{ $teacher }}" :groupmembers="{{ json_encode($groupmembers) }}" :smartcriteria="{{ $smart }}" :confirmed="{{ $confirmed }}"></mijnproject_vue>
  @else
    <details_vue :is_student="{{ $isStudent }}" :project="{{ $project }}" :teacher="{{ $teacher }}" :groupmembers="{{ json_encode($groupmembers) }}" :smartcriteria="{{ $smart }}"></details_vue>
  @endif
@endsection
