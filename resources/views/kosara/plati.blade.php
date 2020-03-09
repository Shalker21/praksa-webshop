@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>NAPLATA</h2>
        <p>Molimo Vas, popunite sva poslja</p>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ime">Ime: </label>
                <input type="text" name="ime" class="form-control">
            </div>

            <div class="form-group">
                <label for="prezime">Prezime: </label>
                <input type="text" name="prezime" class="form-control">
            </div>

            <div class="form-group">
                <label for="adresa">Adresa: </label>
                <input type="text" name="adresa" class="form-control">
            </div>

            <div class="form-group">
                <label for="grad">Grad: </label>
                <input type="text" name="grad" class="form-control">
            </div>

            <div class="form-group">
                <label for="post_broj">Poštanski Broj: </label>
                <input type="text" name="post_broj" class="form-control">
            </div>

            <div class="form-group">
                <label for="telefon">Telefon: </label>
                <input type="text" name="telefon" class="form-control">
            </div>


            <div class="form-group">
                <label for="napomena">Napomena: </label>
                <textarea name="napomena" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Narudžba</button>
        </form>

    </div>
@endsection
