@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="admin/dodajKategoriju" method="POST">
            <div class="form-group">
                <label for="">Naziv Kategorije:</label>
                <input name="naziv" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Dodaj Kategoriju</button>
        </form>
    </div>


@endsection
