<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Carbon\Carbon;

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
        $foods = Food::all();

        foreach($foods as $food) {
            $food->expires_at = (new Carbon($food->expires_at))->diffForHumans();
        }

        return view('home.index')->with("foods", $foods);
    }
}
