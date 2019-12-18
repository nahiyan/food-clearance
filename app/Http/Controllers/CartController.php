<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = CartItem::orderBy("id", "desc")->where("user_id", Auth::user()->id)->get();

        return view("cart.index")->with("entries", $entries);
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
            'quantity' => 'required|numeric|min:1',
            'food_id' => 'required|numeric|exists:foods,id',
        ]);

        $request->merge([
            "user_id" => Auth::user()->id,
        ]);

        $existing_items = CartItem::where([
            ["food_id", $request->input("food_id")],
            ["user_id", Auth::user()->id],
        ])->get();

        if ($existing_items->count() == 0) {
            CartItem::create($request->all());
        } else {
            $existing_item = $existing_items->first();
            $existing_item->quantity = $existing_item->quantity + $request->input("quantity");
            $existing_item->save();
        }

        return "";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cart)
    {
        if ($cart->user_id == Auth::user()->id) {
            $cart->delete();
        } else {
            return redirect("/cart")->with("danger", "You can only delete your own cart items.");
        }

        return redirect("/cart")->with("success", "Deleted successfully!");
    }

    public function checkout()
    {
        return "Checkout";
    }
}
