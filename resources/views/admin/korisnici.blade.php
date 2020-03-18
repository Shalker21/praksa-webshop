@extends('layouts.app')

@section('content')

        <div class="container">
            <h2>KORISNICI</h2>

            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Ime i Prezime</th>
                    <th scope="col">Akcije</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($korisnici as $korisnik)
                    <!-- DA NE ISPISUJE ADMINA -->
                    @if( $korisnik->is_admin  == 0 )
                    <tr>
                        <td>{{ $korisnik->name }}</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">UREDI KORISNIKA</a>
                            <a href="#" class="btn btn-danger">OBRIŠI KORISNIKA</a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Uredi Korisnika</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{ Form::model($korisnik, array('action' => ['admin\AdminController@update', $korisnik->id], 'method' => 'GET', 'id' => 'form')) }}
                                @csrf
                                <div class="modal-body">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Ime i Prezime:') !!}
                                            {!! Form::text('name', $korisnik->name, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::text('email', $korisnik->email, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                        <button type="submit" onclick="submit()" class="btn btn-secondary" data-dismiss="modal">Spremi Promjene</button>
                                    </div>

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                        @else
                    @endif
                    @endforeach
                </tbody>
            </table>
            <script>
                function submit() {
                    document.getElementById('form').submit();
                }
            </script>
        </div>

@endsection
