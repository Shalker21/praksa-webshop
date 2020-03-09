@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>SINGLE</h2>

        <div class="row">
            <div class="card">
                <img class="card-img-top" src="{{ asset('default-image.jpg') }}" alt="image">
                <div class="card-body">
                    <h4 class="card-title">{{ $artikl->ime }}</h4>
                    <p class="card-text">{{ $artikl->opis_artikla }}</p>
                    <small>{{ $artikl->cijena }} Kn</small>
                </div>
                <div class="card-body">
                    <a href="{{ route('kosara.dodaj', $artikl->id ) }}">Dodaj u kosaricu</a>
                </div>
            </div>
        </div>

    </div>
@endsection
