<?php

namespace App\Http\Controllers;

use App\Company;
use App\Food;
use App\Transaction;
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
        if (Auth::user()->type == "admin") {
            $companies = Company::all();
        } else {
            $companies = Auth::user()->companies;
        }

        return view("admin.foods.create", ["companies" => $companies, "type" => Auth::user()->type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type == "admin") {
            $company_id_rule = 'required|numeric|exists:companies,id';
        } else {
            $companies = Auth::user()->companies;

            $company_id_rule = 'required|numeric|in:';

            foreach ($companies as $company) {
                $company_id_rule .= $company->id . ",";
            }
        }

        $request->validate([
            'name' => 'required|unique:foods|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expires_at' => 'required|date',
            'image' => 'required|image',
            'company_id' => $company_id_rule,
        ]);

        $path = $request->file('image')->store('public/images');

        $request->merge(
            [
                "expires_at" => (new Carbon($request->input("expires_at")))->format("Y-m-d H:i:s"),
                "image_name" => str_replace("public/images/", "", $path),
            ]
        );

        $entry = Food::create($request->all());

        return redirect("/" . (Auth::user()->type) . "/foods")->with("success", "Created successfully!");
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
        if (Auth::user()->type == "admin") {
            $companies = Company::all();
        } else {
            $companies = Auth::user()->companies;
        }

        return view("admin.foods.edit", ["entry" => $food, "companies" => $companies, "type" => Auth::user()->type]);
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
        if (Auth::user()->type == "admin") {
            $company_id_rule = 'required|numeric|exists:companies,id';
        } else {
            $companies = Auth::user()->companies;

            $company_id_rule = 'required|numeric|in:';

            foreach ($companies as $company) {
                $company_id_rule .= $company->id . ",";
            }
        }

        $request->validate([
            'name' => 'required|unique:foods,name,' . $food->id . '|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expires_at' => 'required|date',
            'image' => 'sometimes|image',
            'company_id' => $company_id_rule,
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

        return redirect("/" . (Auth::user()->type) . "/foods")->with("success", "Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if (Auth::user()->type == "company") {
            if ($food->company->user->id != Auth::user()->id) {
                return redirect("/company/foods")->with("danger", "You do not have the permission to delete this item.");
            }
        }

        Storage::delete("public/images/" . $food->image_name);
        $food->delete();

        return redirect("/" . (Auth::user()->type) . "/foods")->with("success", "Deleted successfully!");
    }

    public function buy(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $request->validate([
            'quantity' => 'required|numeric|min:1|max:' . $food->quantity,
        ]);

        $quantity = $request->input("quantity");

        Transaction::create([
            "price" => $food->price,
            "quantity" => $quantity,
            "user_id" => Auth::user()->id,
            "food_id" => $food->id,
        ]);

        $food->quantity = $food->quantity - (int) $quantity;
        $food->save();

        return redirect("/")->with("success", "Your order has been placed successfully!");
    }
}
