@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Dodavanje kategorije</h2>

        <div class="navbar">
            <a href="#" class="navbar-brand">Categories=></a>
            <ul class="nav navbar-nav">
                @if(!empty($categories))
                    @foreach($categories as $category)
                        @if($category->level == 1)
                        <li>
                            <a href="#">{{ $category->naziv }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif

            </ul>
        </div>


        <!-- Forma za glavnu kategoriju(musko, zensko, ostalo ...) level => 1 -->
        {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('naziv', 'Glavna kategorija:') }}
            {{ Form::text('naziv', null, ['class' => 'form-control']) }}
            {{ Form::hidden('prva_forma', true) }}
            {{ Form::hidden('level', 1) }}
            {{ Form::hidden('main_category_id', 0) }}
        </div>

        {{ Form::submit('Dodaj Glavnu Kategoriju', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}
        <hr class="bg-primary">

        <h2>Vrsta artikla</h2>
        <!-- Forma za vrstu artikla(level => 2)-->
        {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group mt-3">
            {{ Form::label('category_odabrano', 'Odaberi kategoriju: ') }}
            {{ Form::select('category_odabrano', $pluck, null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group mt-3">
            {{ Form::label('vrsta_naziv', 'Vrsta artikla(pr. dugir rukav majica): ') }}
            {{ Form::text('vrsta_naziv', null, ['class' => 'form-control']) }}
            {{ Form::hidden('druga_forma', true) }}
            {{ Form::hidden('level', 2) }}
        </div>

        {{ Form::submit('Dodaj Vrstu Artikla', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}
    </div>


@endsection
