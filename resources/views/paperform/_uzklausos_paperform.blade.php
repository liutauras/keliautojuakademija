@extends('app')

@section('template_title')
Paperform užklausos
@endsection

@section('template_h1')
Paperform užklausos
@endsection

@section('content')
    <div class="row">
        <div class="col-2">
            Vardas
        </div>
        <div class="col-2">
            Telefonas
        </div>
        <div class="col-2">
            El paštas
        </div>
        <div class="col-1">
            Keliatojų sk.
        </div>
        <div class="col-2">
            Kiti pageidavimai
        </div>
        <div class="col-3">
            Pageidaujamos šalys
        </div>
        
    </div>
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
                {{ $uzklausa->kiti_pageidavimai }}
            </div>
            <div class="col-3">
                {{ $uzklausa->pageidaujamos_salys }}
            </div>
            
        </div>
    @endforeach

    
    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
@stop