@extends('layouts.app')

@section('content')

    <div class="navbar">
        <a href="#" class="navbar-brand">Categories</a>
        <ul class="nav navbar-nav">
            @if(!empty($categories))
                @forelse($categories as $category)
                <li class="active">
                    <a href="">{{ $category->name }}</a>
                </li>
                    @empty
                    <li>No DATA</li>
                @endforelse
            @endif
        </ul>
    </div>

@endsection
