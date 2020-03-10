<?php

namespace App\Http\Controllers;

use App\Order;
use Facade\FlareClient\Report;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Update validation!!!!
        $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'adresa' => 'required',
            'grad' => 'required',
            'telefon' => 'required',
            'napomena' => 'required',
        ]);

        $order = new Order();

        // Podaci za orders table
        $order->ime = $request->input('ime');
        $order->prezime = $request->input('prezime');
        $order->adresa = $request->input('adresa');
        $order->grad = $request->input('grad');
        $order->postanski_broj = $request->input('post_broj');
        $order->telefon = $request->input('telefon');
        $order->napomena = $request->input('napomena');

        $order->ukupna_cijena = \Cart::session(auth()->id())->getTotal();
        $order->kolicina = \Cart::session(auth()->id())->getTotalQuantity();

        $order->broj_narudzbe = uniqid('BrojNarudzbe-');
        $order->user_id = auth()->id();

        $order->save();

        $artikli_u_kosari = \Cart::session(auth()->id())->getContent();

        foreach ($artikli_u_kosari as $artikl) {
            $order->items()->attach($artikl->id, [
                'cijena' => $artikl->price,
                'kolicina' => $artikl->quantity
            ]);
        }

        \Cart::session(auth()->id())->clear();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

    }
}
