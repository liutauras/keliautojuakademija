@extends('app')

@section('template_title')
Visos sukurtos paperform'os
@endsection

@section('content')

    <a href="{{ route('paperform.create') }}">Sukurti naują</a>

    @foreach($paperforms as $paperform)
        <div class="form-group">
            <p>{{ $paperform->pavadinimas }} <a href="{{ route('paperform.showpaperform.show', $paperform->url) }}" class="btn btn-secondary">Užpildyti užklausą</a> | <a href="{{ route('paperform.edit', $paperform->id) }}" class="btn btn-primary">Redaguoti</a></p>
        </div>
    @endforeach
@stop