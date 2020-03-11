<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use foo\bar;
use Illuminate\Http\Request;
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
        $product = new Product();
        $product->ime = $request->input('ime');
        $product->opis_artikla = $request->input('opis_artikla');
        $product->cijena = $request->input('cijena');
        $product->akcijska_cijena = $request->input('akcijska_cijena');
        $product->velicina = $request->input('velicina');
        $product->level = $request->input('level');
        $product->category_id = $request->input('category_id');
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
