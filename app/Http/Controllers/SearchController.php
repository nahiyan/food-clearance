<?php

namespace App\Http\Controllers;

use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request, $query)
    {
        $foods = DB::table('foods')
            ->where('name', 'like', "%$query%")
            ->get();

        $food_structures = [];
        foreach ($foods as $food) {
            $structure = array(
                "id" => $food->id,
                "name" => $food->name,
                "expires_at" => (new Carbon($food->expires_at))->diffForHumans(),
                "image_name" => $food->image_name,
                "quantity" => $food->quantity,
                "company_id" => $food->company_id,
                "company_name" => Company::find($food->company_id)->name,
                "created_at" => $food->created_at,
                "updated_at" => $food->updated_at,
            );
            array_push($food_structures, $structure);
        }

        return response()->json($food_structures);
    }
}
