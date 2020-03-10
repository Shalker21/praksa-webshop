@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-info m-3 pb-5">Narudzbe prema artiklu</h3>

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
