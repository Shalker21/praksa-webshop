<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artikli = Product::take(20)->get();
        return view('home')->with('artikli', $artikli);
    }

    public function adminHome() {
        return view('admin.home');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $products = DB::table('products')->where('ime', 'like', '%'.$query.'%')->get();

        return view('search-results')->with('products', $products);
    }
}
