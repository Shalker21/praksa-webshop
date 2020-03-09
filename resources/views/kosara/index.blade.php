@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Košara</h2>



            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Naziv Artikla</td>
                        <td>Cijena</td>
                        <td>Količina</td>
                        <td>Opcije</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($kosaraArtikli as $artikl)
                    <tr>
                        <td>{{ $artikl->name }}</td>
                        <td>{{ \Cart::session(auth()->id())->get($artikl->id)->getPriceSum() }} Kn</td>
                        <td>
                            <form action="{{ route('kosara.update', $artikl->id) }}">
                            <input name="quantity" type="number" value="{{ $artikl->quantity }}">

                            <input class="btn btn-primary" type="submit" value="Spremi">
                            </form>
                        </td>
                        <td><a href="{{ route('kosara.brisi', $artikl->id) }}">Obriši</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h4>Ukupno: {{ \Cart::session(auth()->id())->getTotal() }} kn</h4>

        <a href="{{ route('kosara.plati') }}" class="btn btn-primary">Plati odabrano</a>


    </div>
@endsection
