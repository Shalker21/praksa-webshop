<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class KosaraController extends Controller
{
    public function dodaj(Product $product) {


        // Dodajemo artikl u kosaru na temelju
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->ime,
            'price' => $product->cijena,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('kosara.index');
    }

    public function index() {

        $kosaraArtikli = \Cart::session(auth()->id())->getContent();

        return view('kosara.index')->with('kosaraArtikli', $kosaraArtikli);
    }

    public function brisi($artiklId) {

        \Cart::session(auth()->id())->remove($artiklId);

        return back();
    }

    public function update($artiklId) {
        \Cart::session(auth()->id())->update($artiklId,[
            'quantity' => array(
                'relative' => false,
                'value' => \request('quantity')
            )
        ]);

        return back();
    }

    public function plati() {

        return view('kosara.plati');
    }
}
