@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mt-3">SVI ARTIKLI</h2>
        <hr>
        <div class="navbar">
            <a href="#" class="navbar-brand">KATEGORIJE =></a>
            <ul class="navbar-nav">
                @if(!empty($categories))
                    @foreach($categories as $category)
                        @if($category->level == 1)
                            <li>
                                <a href="{{ route('admin.prikaziVrsteArtikala', $category->id) }}">{{ $category->naziv }}</a>
                            </li>
                         @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <section>

            <table class="table table-hover">
                <thead>
                <tr>
                    <td>VRSTE PROIZVODA</td>
                </tr>
                </thead>
                <tbody>
                @if(isset($pluck))
                    @foreach($pluck as $p)
                        <tr>
                            <td>{{ $p }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </section>
    </div>
@endsection
