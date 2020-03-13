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
                            <td><a class="vrsta" href="#" data-id="{{ $p->id }}">{{ $p->naziv }}</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </section>

        <div id="artikli" class="row">

        </div>


        <!-- svi produkti koji imaju level column isti kao u categories id
            if(products->level == categories->id) {
                ispisi artikle
            }
        -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".vrsta").click(function() {
                        // alert($(this).data('id'));
                        $.ajax({
                            url: "{{ route('admin.fetchVrsteArtikli') }}?id="+$(this).data('id'),
                            method: 'GET',
                            success: function(data) {
                                $('#artikli').html(data.html);
                            }
                        });
                    });
                });
            </script>
    </div>
@endsection
