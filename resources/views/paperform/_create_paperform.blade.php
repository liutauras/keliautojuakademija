@extends('app')

@section('template_title')
Sukurti naują paperform integraciją
@endsection

@section('template_h1')
Sukurti naują paperform integraciją
@endsection

@section('content')

    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <!-- Error message 
    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Formoje yra klaidų:</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    -->

    <form method="post" action="{{ route('paperform.store') }}">

    <!-- CROSS Site Request Forgery Protection -->
    @csrf

    <div class="form-group">
        <label>Pavadinimas</label>
        <input type="text" class="form-control" name="pavadinimas" id="pavadinimas" value="{{ old('pavadinimas') }}">
        @if ($errors->has('pavadinimas'))
            <div class="error">
                {{ $errors->first('pavadinimas') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Url - mūsų tinklapyje ši forma bus matoma su čia nurodytu adresu</label>
        <input class="form-control" name="url" id="url" value="{{ old('url') }}">
        @if ($errors->has('url'))
            <div class="error">
                {{ $errors->first('url') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>paperform_code - formos html kodas paperform sistemoje</label>
        <textarea name="paperform_code" id="paperform_code" cols="" rows="4" class="form-control">{{ old('paperform_code') }}</textarea>
        @if ($errors->has('paperform_code'))
            <div class="error">
                {{ $errors->first('paperform_code') }}
            </div>
        @endif
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

    <input type="submit" name="send" value="Įvesti" class="btn btn-dark btn-block">
    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
    </form>
@stop