<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use foo\bar;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Component\VarDumper\Caster\PdoCaster;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {

            // $categories = Category::pluck('naziv', 'id');

            return view('admin.store');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ime' => 'required',
            'opis_artikla' => 'required',
            'cijena' => 'required',
            'akcijska_cijena' => 'required',
            'velicina' => 'required',
            'level' => 'required',
            'category_id' => 'required',
            'path_slika' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('path_slika')) {
            $fileNameWtihExt = $request->file('path_slika')->getClientOriginalName();
            $fileName = pathinfo($fileNameWtihExt, PATHINFO_FILENAME);
            $extention = $request->file('path_slika')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extention;
            $path = $request->file('path_slika')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'default-image.jpg';
        }

        $product = new Product();
        $product->ime = $request->input('ime');
        $product->opis_artikla = $request->input('opis_artikla');
        $product->cijena = $request->input('cijena');
        $product->akcijska_cijena = $request->input('akcijska_cijena');
        $product->velicina = $request->input('velicina');
        $product->level = $request->input('level');
        $product->category_id = $request->input('category_id');
        $product->path_slika = $fileNameToStore;
        $product->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        //dd($productId);
        $artikl = Product::find($productId);

        return view('korisnik.show')->with('artikl', $artikl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
