@extends('app')

@section('template_title')
Paperform'os užpildymas
@endsection

@section('template_h1')
Prašome užpildyti formos duomenis
@endsection

@section('content')
<!--
    <div class="form-group">
        <label>Pavadinimas</label>
        <p>{{ $paperform->pavadinimas }}</p>
    </div>

    <div class="form-group">
        <label>Url</label>
        <p>{{ $paperform->url }}</p>
    </div>

    <div class="form-group">
        <label>paperform_code</label>
        <p>{{ $paperform->paperform_code }}</p>
    </div>


    <div class="form-group">
        <label>Puslapis</label>
        <p>{{ $paperform->puslapis }}</p>
    </div>

    <div class="form-group">
        <label>Vardas</label>
        <p>{{ $paperform->vardas }}</p>
    </div>

    <div class="form-group">
        <label>Telefonas</label>
        <p>{{ $paperform->tel }}</p>
    </div>

    <div class="form-group">
        <label>El. paštas</label>
        <p>{{ $paperform->el_pastas }}</p>
    </div>

    <div class="form-group">
        <label>Užklausa</label>
        <p>{{ $paperform->uzklausa }}</p>
    </div>
-->
    {!!    $paperform->paperform_code    !!}
    
    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
@stop