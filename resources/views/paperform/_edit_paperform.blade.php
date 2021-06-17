@extends('app')

@section('template_title')
Redaguojama PaperformID: {{ $paperform->id }}
@endsection

@section('template_h1')
Paperform redagavimas
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

    <form method="POST" action="{{ route('paperform.update', $paperform->id) }}">

    <!-- CROSS Site Request Forgery Protection -->
    @csrf
    <!-- METHOD PUT -->
    <input name="_method" type="hidden" value="PUT">

    <div class="form-group">
        <label>Pavadinimas</label>
        <input type="text" class="form-control" name="pavadinimas" id="pavadinimas" value="{{ old('pavadinimas') != '' ?  old('pavadinimas') : $paperform->pavadinimas }}">
        @if ($errors->has('pavadinimas'))
            <div class="error">
                {{ $errors->first('pavadinimas') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>Url - mūsų tinklapyje ši forma bus matoma su čia nurodytu adresu</label>
        <input type="text" class="form-control" name="url" id="url" value="{{ old('url') != '' ?  old('url') : $paperform->url }}">
        @if ($errors->has('url'))
            <div class="error">
                {{ $errors->first('url') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>paperform_code - formos html kodas paperform sistemoje</label>
        <textarea name="paperform_code" id="paperform_code" cols="" rows="4" class="form-control">{{ old('paperform_code') != '' ?  old('paperform_code') : $paperform->paperform_code }}</textarea>
        @if ($errors->has('paperform_code'))
            <div class="error">
                {{ $errors->first('paperform_code') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>puslapis</label>
        <input type="text" class="form-control" name="puslapis" id="puslapis" value="{{ old('puslapis') != '' ?  old('puslapis') : $paperform->puslapis }}">
        @if ($errors->has('puslapis'))
            <div class="error">
                {{ $errors->first('puslapis') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>vardas</label>
        <input type="text" class="form-control" name="vardas" id="vardas" value="{{ old('vardas') != '' ?  old('vardas') : $paperform->vardas }}">
        @if ($errors->has('vardas'))
            <div class="error">
                {{ $errors->first('vardas') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>tel</label>
        <input type="text" class="form-control" name="tel" id="tel" value="{{ old('tel') != '' ?  old('tel') : $paperform->tel }}">
        @if ($errors->has('tel'))
            <div class="error">
                {{ $errors->first('tel') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>el_pastas</label>
        <input type="text" class="form-control" name="el_pastas" id="el_pastas" value="{{ old('el_pastas') != '' ?  old('el_pastas') : $paperform->el_pastas }}">
        @if ($errors->has('el_pastas'))
            <div class="error">
                {{ $errors->first('el_pastas') }}
            </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>uzklausa</label>
        <input type="text" class="form-control" name="uzklausa" id="uzklausa" value="{{ old('uzklausa') != '' ?  old('uzklausa') : $paperform->uzklausa }}">
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