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
                    <td>VRSTE PROIZVODA: </td>
                </tr>
                </thead>
                <tbody>
                @if(isset($pluck))
                    @foreach($pluck as $p)
                        <tr>
                            <td>
                                <form>
                                    <a onclick="showUser(this.value, {{ $p->id }})" class="vrsta" href="#">{{ $p->naziv }}</a>
                                </form>
                            </td>
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
                function showUser(str, id) {
                    if (str=="") {
                        document.getElementById("txtHint").innerHTML="";
                        return;
                    }
                    if (window.XMLHttpRequest) {
                        xmlhttp=new XMLHttpRequest();
                    } else {
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function() {
                        if (this.readyState==4 && this.status==200) {
                            document.getElementById("artikli").innerHTML=this.responseText;
                        }
                    }
                    xmlhttp.open("GET","{{ route('admin.fetchVrsteArtikli') }}?id="+id,true);
                    xmlhttp.send();
                }
                // -------------------------

            </script>
    </div>
@endsection
