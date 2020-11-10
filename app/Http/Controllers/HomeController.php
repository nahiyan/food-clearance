<?php

namespace App\Http\Controllers;

use App\Models\Food;

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
        $foods = Food::orderBy("expires_at", "asc")->get();

        return view('home.index')->with("foods", $foods);
    }
}
