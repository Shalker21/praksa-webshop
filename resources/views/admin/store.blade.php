@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>DODAJ ARTIKL</h2>

        {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'files' => true]) !!}
            <div class="form-group">
                {{ Form::label('ime', 'Naziv Artikla') }}
                {{ Form::text('ime', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('opis_artikla', 'Opis Artikla') }}
                {{ Form::textarea('opis_artikla', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('cijena', 'Cijena') }}
                {{ Form::text('cijena', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('akcijska_cijena', 'Akcijska cijena(opcionalno)') }}
                {{ Form::text('akcijska_cijena', null, ['class' => 'form-control']) }}
            </div>

        <div class="form-group">
            {{ Form::label('velicina', 'Velicina artikla') }}
            {{ Form::select('velicina', ['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large'], null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('level', 'Vrsta produkta') }}
            {{ Form::select('level', [1 => 'dugi rukav majica', 2 => 'kratki rukav majica', 3 => 'duge hlače', 4 => 'kratke hlace', 5 => 'tenisice', 6 => 'haljine', 7 => 'torbe', 8 => 'ostalo'], null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Kategorija') }}
            {{ Form::select('category_id', [1 => 'Muško', 2 => 'Žensko', 3 => 'Ostalo'], null, ['class' => 'form-control']) }}
        </div>

        <!-- DODATI SLIKU -->

        {{ Form::submit('Dodaj artikl', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}

        <!--<form action="product/store" method="POST">
            <div class="form-group">
                <label for="">Naziv artikla:</label>
                <input name="ime" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Opis artikla:</label>
                <textarea name="opis_artikla" type="text" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Cijena:</label>
                <input name="cijena" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Akcijska Cijena(optional):</label>
                <input name="akcijska_cijena" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Kategorija:</label>
                <select name="category_id" class="custom-select" id="type">
                    <option value="">...</option>
                    <option value="item1">Muško</option>
                    <option value="item2">Žensko</option>
                    <option value="item3">Ostalo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Vrsta Artikla <small>(Odaberite kategoriju)</small>:</label>
                <select name="level" class="custom-select" id="produkt">
                    <option value=""> ... </option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Velicina:</label>
                <select name="velicina" class="custom-select">
                    <option value="">...</option>
                    <option value="">S</option>
                    <option value="">M</option>
                    <option value="">L</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Odaberite sliku:</label>
                <input name="path_slika" type="file" />
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Artikl</button>
        </form>



        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function() {

                $("#type").change(function() {
                    var val = $(this).val();
                    if (val == "item1") {
                        $("#produkt").html(
                            "<option value='test'>...</option>" +
                            "<option value='vel1'>Muško: Dugi rukav majice</option>" +
                            "<option value='vel1'>Muško: Kratki rukav majice</option>" +
                            "<option value='vel1'>Muško: trenirke</option>" +
                            "<option value='vel1'>Muško: kratke hlače</option>" +
                            "<option value=''>Muško: torbe</option>"+
                            "<option value='vel2'>Muško: Tenisice</option>"
                        );
                    } else if (val == "item2") {
                        $("#produkt").html("" +
                            "<option value='test'>...</option>" +
                            "<option value='vel1'>Žensko: Dugi rukav majice</option>" +
                            "<option value='vel1'>Žensko: Kratki rukav majice</option>" +
                            "<option value='vel1'>Žensko: trenirke</option>" +
                            "<option value='vel1'>Žensko: kratke hlače</option>" +
                            "<option value='vel1'>Žensko: haljine</option>" +
                            "<option value=''>Žensko: torbe</option>" +
                            "<option value='broj'>Muško: Tenisice</option>"
                        );

                    } else if (val == "item3") {
                        $("#produkt").html(
                            "<option value='test'>...</option>" +
                            "<option value='vel1'>Ostalo: Naočale</option>" +
                            "<option value='broj'>Ostalo: čarape</option>"
                        );
                    }
                });


            });
        </script>-->

    </div>
@endsection
