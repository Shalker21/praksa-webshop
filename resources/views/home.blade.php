@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>ARTIKLI</h2>

    <div class="row">

        @foreach($artikli as $artikl)
            <div class="col-md-4 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('default-image.jpg') }}" alt="image">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('korisnik.show', $artikl->id) }}">{{ $artikl->ime }}</a></h4>
                    <p class="card-text">{{ $artikl->opis_artikla }}</p>
                    <small>{{ $artikl->cijena }} Kn</small>
                </div>

                @if(auth()->check() && auth()->user()->is_admin == 1)
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('kosara.dodaj', $artikl->id ) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('kosara.dodaj', $artikl->id ) }}">Detaljno</a>
                        <a class="btn btn-danger" href="{{ route('kosara.dodaj', $artikl->id ) }}">Obriši</a>
                    </div>
                    @else
                    <div class="card-body">
                        <a href="{{ route('kosara.dodaj', $artikl->id ) }}">Dodaj u kosaricu</a>
                    </div>
                @endif
            </div>
            </div>
        @endforeach

    </div>

</div>
@endsection
