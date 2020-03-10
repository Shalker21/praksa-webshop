@extends('layouts.app')

@section('content')

        <div class="container">
            <h2>KORISNICI</h2>

            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime i Prezime</th>
                    <th scope="col">Akcije</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($korisnici as $korisnik)
                    <!-- DA NE ISPISUJE ADMINA -->
                    @if( $korisnik->is_admin  == 0 )
                    <tr>
                        <th scope="row">{{ $korisnik->id }}</th>
                        <td>{{ $korisnik->name }}</td>
                        <td>
                            <a href="#" class="btn btn-info">UREDI KORISNIKA</a>
                            <a href="#" class="btn btn-danger">OBRIŠI KORISNIKA</a>
                        </td>
                    </tr>
                        @else
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
