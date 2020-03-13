@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-info m-3 pb-5">Narudzbe prema artiklu</h3>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">INFORMACIJE KUPCA</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Ime i Prezime: </th>
                <td>{{ $podaciNarudzbe->ime }} {{ $podaciNarudzbe->prezime }}</td>
            </tr>
            <tr>
                <th scope="row">Adresa: </th>
                <td colspan="2">{{ $podaciNarudzbe->adresa }}</td>
            </tr>
            <tr>
                <th scope="row">Grad: </th>
                <td colspan="2">{{ $podaciNarudzbe->grad }}</td>
            </tr>
            <tr>
                <th scope="row">Poštanski Broj: </th>
                <td colspan="2">{{ $podaciNarudzbe->postanski_broj }}</td>
            </tr>
            <tr>
                <th scope="row">Telefon: </th>
                <td colspan="2">{{ $podaciNarudzbe->telefon }}</td>
            </tr>
            <tr>
                <th scope="row">Način Plačanja: </th>
                <td>{{ $podaciNarudzbe->nacin_placanja }}</td>
            </tr>
            <tr>
                <th scope="row">količina: </th>
                <td>{{ $podaciNarudzbe->kolicina }}</td>
            </tr>
            <tr>
                <th scope="row">Broj Narudžbe: </th>
                <td>{{ $podaciNarudzbe->broj_narudzbe }}</td>
            </tr>
            <tr>
                <th scope="row">Vrijeme Slanja Narudžbe: </th>
                <td colspan="2">{{ $podaciNarudzbe->created_at }}</td>
            </tr>
            </tbody>
        </table>

        <table class="table table-striped">
            <thead class="text-center">
            <tr>
                <th scope="col">Naziv Artikla</th>
                <th scope="col">Kolicina</th>
                <th scope="col">Cijena Artikla</th>
                <th scope="col">Ukupna cijena</th>
                <th scope="col">Akcije</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @forelse($narudzba as $single)
                <tr>
                    <td>{{ $single->ime }}</td>
                    <td>{{ $single->kolicina }}</td>
                    <td>{{ $single->cijena }}</td>
                    <td>{{ $single->cijena * $single->kolicina }} kn</td>
                    <td>
                        <span>
                            <!-- Moramo updatati table orders!!!!! -->
                            <a href="{{ route('admin.obrisiSingleOrderItem', $single->artikl_id) }}" class="btn btn-danger">Obriši</a>
                        </span>
                    </td>
                </tr>
                @empty
                    Nema Podataka
            @endforelse
            </tbody>
        </table>




    </div>
@endsection
