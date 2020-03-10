@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>NARUDZBE</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Korisnik</th>
                <th scope="col">Broj Narudzbe</th>
                <th scope="col">Kolicina</th>
                <th scope="col">Adresa</th>
                <th scope="col">Grad</th>
                <th scope="col">Telefon</th>
                <th scope="col">Vrijeme narudzbe</th>
                <th scope="col">Akcije</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($narudzbe as $narudzba)
            <tr>

                <th scope="row">{{ $narudzba->id }}</th>
                <td>{{ $narudzba->ime }} {{ $narudzba->prezime }}</td>
                <td>{{ $narudzba->broj_narudzbe }}</td>
                <td>{{ $narudzba->kolicina }}</td>
                <td>{{ $narudzba->adresa }}</td>
                <td>{{ $narudzba->grad }}</td>
                <td>{{ $narudzba->telefon }}</td>
                <td>{{ $narudzba->created_at }}</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-secondary">Edit</a>
                    </span>
                    <span>
                        <a href="{{ route('admin.detaljno', $narudzba->id) }}" class="btn btn-primary">Detaljno</a>
                    </span>
                    <span>
                        <a href="#" class="btn btn-danger">Obriši</a>
                    </span>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
