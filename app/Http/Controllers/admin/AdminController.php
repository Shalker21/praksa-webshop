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

        $narudzba = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.narudzba_id')
            ->join('products', 'order_items.artikl_id', '=', 'products.id')
            ->select('orders.*', 'order_items.kolicina', 'order_items.artikl_id', 'products.ime', 'products.cijena')
            ->where('orders.id', '=', $id)
            ->get();

        return view('admin.detaljno')->with(['narudzba'=> $narudzba]);
    }

    public function obrisiSingleOrderItem($id) {
        // id oreder items i obrisati ako je cijena i kolicina 0
        // MORAMO UPDATATI ORDERS TABLE
        $row = DB::table('order_items')->where('artikl_id', '=', $id)->get();

        $orders_id = $row[0]->narudzba_id;
        // mnozimo jer nismo spremili ukupnu cijenu prema kolicini neko cijenu single artikla(ISPRAVITI TO)!!!!
        $decrementCijena = $row[0]->cijena * $row[0]->kolicina;
        $decrementKolicina = $row[0]->kolicina;

        // Brisemo row artikla u order_items
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

        return view('admin.sviArtikli');
    }

    public function korisnici() {

        $korisnici = User::all();

        return view('admin.korisnici')->with('korisnici', $korisnici);
    }

    public function dodajArtikl() {
        return view('admin.store');
    }

    public function dodajKategoriju() {
        return view('admin.dodajKategoriju');
    }
}
