<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request, $query)
    {
        $foods = DB::table('foods')
            ->where('foods.name', 'like', "%$query%")
            ->leftJoin("companies", "companies.id", "=", "foods.company_id")
            ->select("foods.*", "companies.name as company_name")
            ->get();

        return view('search.index')->with("foods", $foods);
    }
}
