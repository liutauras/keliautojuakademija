@extends('app')

@section('content')
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
        <input type="text" class="form-control" name="puslapis" id="puslapis" value="{{ old('puslapis') }}">
        @if ($errors->has('puslapis'))
            <div class="error">
                {{ $errors->first('puslapis') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Vardas</label>
        <input type="text" class="form-control" name="vardas" id="vardas" value="{{ old('vardas') }}">
        @if ($errors->has('vardas'))
            <div class="error">
                {{ $errors->first('vardas') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Telefonas</label>
        <input type="text" class="form-control" name="tel" id="tel" value="{{ old('tel') }}">
        @if ($errors->has('tel'))
            <div class="error">
                {{ $errors->first('tel') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>El. paštas</label>
        <input type="text" class="form-control" name="el_pastas" id="el_pastas" value="{{ old('el_pastas') }}">
        @if ($errors->has('el_pastas'))
            <div class="error">
                {{ $errors->first('el_pastas') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Užklausa</label>
        <input type="text" class="form-control" name="uzklausa" id="uzklausa" value="{{ old('uzklausa') }}">
        @if ($errors->has('uzklausa'))
            <div class="error">
                {{ $errors->first('uzklausa') }}
            </div>
        @endif
    </div>
    
    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
@stop