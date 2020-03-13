@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>DODAJ ARTIKL</h2>

        {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'files' => true]) !!}
            @csrf
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
            {{ Form::label('category_id', 'Kategorija') }}
            <select name="category_id" id="main_cat" class="form-control dynamic">
                <option value=""> . . . </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('level', 'Vrsta Artikla') }}
            <select name="level" id="level" class="form-control">
                <option value=""> . . . </option>
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('velicina', 'Velicina artikla') }}
            {{ Form::text('velicina', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('path_slika', 'Slika Upload =>  ') }}
            {{ Form::file('path_slika', null, ['class' => 'form-control']) }}
        </div>


        <!-- DODATI SLIKU -->

        {{ Form::submit('Dodaj artikl', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#main_cat").change(function(){
                    console.log('TEST');
                    $.ajax({
                        url: "{{ route('admin.fetch') }}?main_kategorija_id="+$(this).val(),
                        method: 'GET',
                        success: function(data) {
                            $('#level').html(data.html);
                        }
                    });
                });
            });
        </script>
    </div>

@endsection

