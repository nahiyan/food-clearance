<?php

namespace App\Http\Controllers;

use App\Company;
use App\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $entries = Food::orderBy("id", "desc")->get();

        return view("admin.foods.index")->with("entries", $entries);
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
            'company_id' => 'required|numeric',
        ]);

        $path = $request->file('image')->store('public/images');
        $company = Company::find($request->input("company_id"));

        $request->merge(
            [
                "expires_at" => (new Carbon($request->input("expires_at")))->format("Y-m-d H:i:s"),
                "image_name" => str_replace("public/images/", "", $path),
                "company_id" => $company->id,
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
        return view("admin.foods.edit")->with("entry", $food);
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
        $food->delete();

        return redirect("/admin/foods")->with("success", "Deleted successfully!");
    }
}
