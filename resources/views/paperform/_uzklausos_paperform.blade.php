@extends('app')

@section('template_title')
Paperform užklausos
@endsection

@section('template_h1')
Paperform užklausos
@endsection

@section('content')
    @foreach($uzklausos as $uzklausa)
        <div class="row">
            <!--
            <div class="col-2">
                {{ $uzklausa->puslapis }}
            </div>
            -->
            <div class="col-2">
                {{ $uzklausa->vardas }}
            </div>
            <div class="col-2">
                {{ $uzklausa->tel }}
            </div>
            <div class="col-2">
                {{ $uzklausa->el_pastas }}
            </div>
            <div class="col-1">
                {{ $uzklausa->keliatoju_skaicius }}
            </div>
            <div class="col-2">
                {{ implode(", ", $uzklausa->kiti_pageidavimai) }}
            </div>
            <div class="col-3">
                {{ implode(", ", $uzklausa->pageidaujamos_salys) }}
            </div>
            
        </div>
    @endforeach

    
    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
@stop