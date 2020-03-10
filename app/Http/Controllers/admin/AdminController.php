<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
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
        $narudzba = DB::table('orders')->find($id);

        $narudzba = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.narudzba_id')
            ->join('products', 'order_items.artikl_id', '=', 'products.id')
            ->select('orders.*', 'order_items.kolicina', 'order_items.artikl_id', 'products.ime', 'products.cijena')
            ->where('orders.id', '=', $id)
            ->get();

        return view('admin.detaljno')->with(['narudzba'=> $narudzba]);
    }

    public function obrisiSingleOrderItem($id) {
        // MORAMO UPDATATI ORDERS TABLE
        // $row = DB::table('order_items')->where('artikl_id', '=', $id)->get();
        return back();
    }

    // OBRISATI JER NIJE POTREBNO, OBRISATI I U NAVIGACIJI !!
    public function sviArtikli() {

        return view('admin.sviArtikli');
    }

    public function korisnici() {

        $korisnici = User::all();

        return view('admin.korisnici')->with('korisnici', $korisnici);
    }
}
