<?php

namespace App\Http\Controllers;

use App\Company;
use App\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == "admin") {
            $entries = Food::orderBy("id", "desc")->get();
        } else {
            $entries = [];

            $companies = Auth::user()->companies;

            foreach ($companies as $company) {
                $foods = $company->foods;

                foreach ($foods as $food) {
                    $entries[] = $food;
                }
            }
        }

        return view("admin.foods.index", ["entries" => $entries, "type" => Auth::user()->type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view("admin.foods.create")->with("companies", $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:foods|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expires_at' => 'required|date',
            'image' => 'required|image',
            'company_id' => 'required|numeric|exists:companies,id',
        ]);

        $path = $request->file('image')->store('public/images');

        $request->merge(
            [
                "expires_at" => (new Carbon($request->input("expires_at")))->format("Y-m-d H:i:s"),
                "image_name" => str_replace("public/images/", "", $path),
            ]
        );

        $entry = Food::create($request->all());

        return redirect("/admin/foods")->with("success", "Created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view("admin.foods.show")->with("entry", $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $companies = Company::all();

        return view("admin.foods.edit", ["entry" => $food, "companies" => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|unique:foods,name,' . $food->id . '|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expires_at' => 'required|date',
            'image' => 'sometimes|image',
            'company_id' => 'required|numeric|exists:companies,id',
        ]);

        if ($request->file("image")) {
            Storage::delete("public/images/" . $food->image_name);
            $path = $request->file('image')->store('public/images');

            $request->merge(
                [
                    "image_name" => str_replace("public/images/", "", $path),
                ]
            );
        }

        $request->merge(
            [
                "expires_at" => (new Carbon($request->input("expires_at")))->format("Y-m-d H:i:s"),
            ]
        );

        $food->update($request->all());

        return redirect("/admin/foods")->with("success", "Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        Storage::delete("public/images/" . $food->image_name);
        $food->delete();

        return redirect("/admin/foods")->with("success", "Deleted successfully!");
    }
}
