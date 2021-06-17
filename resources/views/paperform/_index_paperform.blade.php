@extends('app')

@section('template_title')
Visos sukurtos paperform'os
@endsection

@section('template_h1')
Visos paperform formos
@endsection

@section('content')
    <div class="form-group">
        <div class="row justify-content-end">
            <div class="col-3">
                <a href="{{ route('paperform.create') }}" class="btn btn-success btn-block">Sukurti naują</a>
            </div>
        </div>
    </div>
    @foreach($paperforms as $paperform)
        <div class="form-group">
            <div class="row">
                <div class="col-5">
                    {{ $paperform->pavadinimas }}
                </div>
                <div class="col-3">
                    <a href="{{ route('paperform.showpaperform.show', $paperform->url) }}" class="btn btn-secondary btn-block">Užpildyti formą</a>
                </div>
                <div class="col-3">
                    <a href="{{ route('paperform.edit', $paperform->id) }}" class="btn btn-primary  btn-block">Redaguoti</a>
                </div>
                <div class="col-1">
                    <form method="POST" action="{{ route('paperform.destroy', [ 'id'=> $paperform->id ]) }}" style="padding: 0; border: 0px;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-icon">Trinti</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@stop