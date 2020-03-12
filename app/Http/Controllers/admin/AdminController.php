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

    public function narudzbe() {
        $narudzbe = DB::table('orders')->get();

        return view('admin.narudzbe')->with('narudzbe', $narudzbe);
    }

    public function detaljno($id) {

        $narudzba = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.narudzba_id')
            ->join('products', 'order_items.artikl_id', '=', 'products.id')
            ->select('orders.*', 'order_items.kolicina', 'order_items.artikl_id', 'products.ime', 'products.cijena')
            ->where('orders.id', '=', $id)
            ->get();

        return view('admin.detaljno')->with(['narudzba'=> $narudzba]);
    }

    public function obrisiSingleOrderItem($id) {
        $row = DB::table('order_items')->where('artikl_id', '=', $id)->get();
        $orders_id = $row[0]->narudzba_id;
        $decrementCijena = $row[0]->cijena * $row[0]->kolicina;
        $decrementKolicina = $row[0]->kolicina;
        DB::table('order_items')->where('artikl_id', '=', $id)->delete();
        $orders = DB::table('orders')->where('id' , '=', $orders_id)->get();
        DB::table('orders')
            ->where('id' , '=', $orders_id)
            ->update([
                'ukupna_cijena' => $orders[0]->ukupna_cijena - $decrementCijena,
                'kolicina' => $orders[0]->kolicina - $decrementKolicina
            ]);

    dd($orders[0]->kolicina);

        if($orders[0]->kolicina <= 0) {
            dd($orders[0]->kolicina);
            DB::table('orders')->where('id' , '=', $orders_id)->delete();
        }

        return back();
    }

    public function obrisiNarudzbu($id) {
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
        $pluck = $categories->where('main_category_id', '=', $id)->pluck('naziv', 'id');

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

}
