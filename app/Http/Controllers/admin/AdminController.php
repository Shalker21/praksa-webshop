<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function update(Request $request, $id)  {
        dd($request->input('name'));

        $user->name = request('name');
        $user->email = request('email');

        $request->save();

        return back();
    }

    public function narudzbe() {
        $narudzbe = DB::table('orders')->get();

        return view('admin.narudzbe')->with('narudzbe', $narudzbe);
    }

    public function detaljno($id) {
        $podaciNarudzbe = Order::find($id);
        $narudzba = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.narudzba_id')
            ->join('products', 'order_items.artikl_id', '=', 'products.id')
            ->select('orders.*', 'order_items.kolicina', 'order_items.artikl_id', 'products.ime', 'products.cijena')
            ->where('orders.id', '=', $id)
            ->get();

        return view('admin.detaljno')->with(['narudzba'=> $narudzba, 'podaciNarudzbe' => $podaciNarudzbe]);
    }

    public function obrisiSingleOrderItem($id) {
        $order_items = DB::table('order_items')->where('artikl_id', '=', $id)->get();
        $orders = DB::table('orders')->where('id', '=', $order_items[0]->narudzba_id)->get();
        $novaKolicina = $orders[0]->kolicina - $order_items[0]->kolicina;
        $novaCijena = $orders[0]->ukupna_cijena - ($order_items[0]->cijena * $order_items[0]->kolicina);
        DB::table('order_items')->where('artikl_id', '=', $id)->delete();
        DB::table('orders')
            ->where('id', '=', $order_items[0]->narudzba_id)
            ->update(['kolicina' => $novaKolicina, 'ukupna_cijena' => $novaCijena]);

        // Srediti brisanje cijele narudzbe ako se obrise zadnji artikl

        return back();
    }

    public function obrisiNarudzbu($id) {
        DB::table('order_items')->where('narudzba_id', '=', $id)->delete();
        DB::table('orders')->where('id' , '=', $id)->delete();

        return back();
    }

    // OBRISATI JER NIJE POTREBNO, OBRISATI I U NAVIGACIJI !!
    public function sviArtikli() {
        $categories = Category::all();

        return view('admin.sviArtikli')->with('categories', $categories);
    }

    public function prikaziVrsteArtikala($id)
    {
        $categories = Category::all();
        $pluck = $categories->where('main_category_id', '=', $id);
        return view('admin.sviArtikli')->with(['categories' => $categories, 'pluck' => $pluck]);
    }


    public function korisnici() {
        $korisnici = User::all();
        return view('admin.korisnici')->with('korisnici', $korisnici);
    }

    public function dodajArtikl() {
        $cat = Category::all();
        $categories = $cat->where('level', '=', 1)->all();
        return view('admin.store')->with(['categories' => $categories]);
    }

    public function fetch(Request $request) {
        $html = '';
        $vrste = Category::where('main_category_id', $request->main_kategorija_id)->get();
        foreach ($vrste as $vrsta) {
            $html .= '<option value="'.$vrsta->id.'">'.$vrsta->naziv.'</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function fetchVrsteArtikli(Request $request) {
        $html = '';
        $proizvodiPremaVrstiArtikla = Product::where('level', '=', $request->id)->get();

        // Upgradati za korisnika da ima button za dodavanje u kosaricu
        foreach ($proizvodiPremaVrstiArtikla as $proizvod) {
            $html .= '<div class="card m-3">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="card-img-top" src="/public/images/default-image.jpg" alt="image">
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="korisnik/show/' . $proizvod->id . ' ">'.$proizvod->ime.'</a></h4>
                                    <p class="card-text">'.$proizvod->opis_artikla .'</p>
                                    <small>'. $proizvod->cijena .'Kn</small>
                                </div>';
                            if(auth()->check() && auth()->user()->is_admin == 1) {
                                $html .= '<div class="card-body" >
                                    <a class="btn btn-primary" href = "#" > Edit</a >
                                    <a class="btn btn-primary" href = "#" > Detaljno</a >
                                    <a class="btn btn-danger" href = "#" > Obriši</a >
                                </div >';
                            } else {
                                $html .= '<div class="card-body" >
                                    <a href = "kosara/dodaj/'.$proizvod->id.'" > Dodaj u kosaricu </a >
                                </div >';
                            }

                            $html .= '</div>
                        </div>
                    </div>';
        }

        return $html;
    }

    public function deleteKorisnika($id) {

    }
}
