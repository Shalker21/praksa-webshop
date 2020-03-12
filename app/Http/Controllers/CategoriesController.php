<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // kako bi mogli dohvatiti id glavne kategorijje
        $pluck = $categories->where('level', 1)->pluck('naziv', 'id');

        return view('admin.dodajKategoriju')->with(['categories' => $categories, 'pluck' => $pluck]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        // Moramo provjeriti da li passamo data from first form ako ne onda je to druga forma
        if ($request->get('prva_forma')) {

            $category->naziv = $request->input('naziv');
            $category->level = $request->input('level');
            $category->main_category_id = $request->input('main_category_id');

            $category->save();
            return back();
        }

        if ($request->get('prva_forma')) {

            $category->naziv = $request->input('naziv');
            $category->level = $request->input('level');
            $category->main_category_id = $request->input('main_category_id');

            $category->save();
            return back();
        }

        if ($request->get('druga_forma')) {
            $category->naziv = $request->input('vrsta_naziv');
            $category->level = $request->input('level');
            $category->main_category_id = $request->input('category_odabrano');
            $category->save();
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
