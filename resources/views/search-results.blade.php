@extends('layouts.app')

@section('content')

    <div class="search-container container text-center">
        <h2>TRAŽENI ARTIKLI</h2>

        <div class="row">

            @foreach($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="card-img-top" src="https://omegamma.com.au/wp-content/uploads/2017/04/default-image.jpg" alt="image">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{ route('korisnik.show', $product->id) }}">{{ $product->ime }}</a></h4>
                            <p class="card-text">{{ $product->opis_artikla }}</p>
                            <small>{{ $product->cijena }} Kn</small>
                        </div>

                        @if(auth()->check() && auth()->user()->is_admin == 1)
                            <div class="card-body">
                                <a class="btn btn-primary" href="{{ route('kosara.dodaj', $product->id ) }}">Edit</a>
                                <a class="btn btn-primary" href="{{ route('kosara.dodaj', $product->id ) }}">Detaljno</a>
                                <a class="btn btn-danger" href="{{ route('kosara.dodaj', $product->id ) }}">Obriši</a>
                            </div>
                        @else
                            <div class="card-body">
                                <a href="{{ route('kosara.dodaj', $product->id ) }}">Dodaj u kosaricu</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
