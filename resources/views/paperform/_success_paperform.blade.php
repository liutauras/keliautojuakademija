@extends('app')

@section('template_title')
Užpildytos formos duomenys
@endsection

@section('template_h1')
Užpildytos formos duomenys
@endsection

@section('content')
    <div class="form-group">
        <label>Vardas</label>
        <p>{{ $data['vardas'] }}</p>
    </div>
    
    <div class="form-group">
        <label>Telefonas</label>
        <p>{{ $data['tel'] }}</p>
    </div>
    
    <div class="form-group">
        <label>El. paštas</label>
        <p>{{ $data['el_pastas'] }}</p>
    </div>
    
    <div class="form-group">
        <label>Pageidaujamos šalys</label>
        <p>{{ $data['salys'] }}</p>
    </div>
    
    <div class="form-group">
        <label>Keliautojų skaičius</label>
        <p>{{ $data['keliautoju'] }}</p>
    </div>
    
    <div class="form-group">
        <label>Pageidavimai</label>
        <p>{{ $data['pageidavimai'] }}</p>
    </div>

    <a href="{{ route('paperform.index') }}" class="btn btn-primary  btn-block">Į pradžią</a>
@stop