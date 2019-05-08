{{-- extend the parent tpl --}}
@extends('layouts.app')
{{-- set the pagetitle in the parent tpl --}}
@section('name', 'Student')
@section('content')
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table">
                <div class="row header">
                    <div class="cell">
                        {{-- Miss dit ook automatisch uit kollom naam halen --}}
                        Groep
                    </div>
                    <div class="cell">
                        Naam
                    </div>
                    <div class="cell">
                        Projectvoorstel
                    </div>
                    <div class="cell">
                        Belbin
                    </div>
                </div>
                @if($students)
                    @foreach($students as $key => $student)
                <div class="row">
                    <div class="cell" data-title="Groep">
                        {{-- hier moet nog controller om te checken ofdat groep vol is. --}}
                        @if ($student->Groepleden == "4" )
                            <p>&#10004;</p> 
                        @elseif ($student->Groepleden == "0" )
                            <p>&#10006;</p>
                        @else
                            <p>&#10068;</p>
                        @endif
                        
                    </div>
                    <div class="cell" data-title="Naam">
                        {{ $student->Voornaam }} {{ $student->Naam }}
                    </div>
                    <div class="cell" data-title="Projectvoorstel">
                        {{-- hier moet nog controller groep te tonen --}}
                        {{ $student->Groep }}
                    </div>
                    <div class="cell" data-title="Belbin">
                        <img src="{{ asset("storage/>img/$student->image") }}" style="    width:29px;height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#0" class="cd-close">Sluiten</a>
@endsection