<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $can_checkout = true;
        $net_price = 0;
        foreach ($entries as $entry) {
            $net_price += $entry->food->price * $entry->quantity;

            if ($entry->quantity > $entry->food->quantity) {
                $can_checkout = false;
            }
        }

        return view("cart.index", ["entries" => $entries, "net_price" => $net_price, "can_checkout" => $can_checkout]);
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
        $entries = CartItem::orderBy("id", "desc")->where("user_id", Auth::user()->id)->get();

        $can_checkout = true;
        foreach ($entries as $entry) {
            if ($entry->quantity > $entry->food->quantity) {
                $can_checkout = false;

                break;
            }
        }

        if (!$can_checkout) {
            return redirect("/cart")->with("danger", "You cannot checkout as one or more of the items in your cart are in amount exceeding that available.");
        } else {
            // insert transactions
            $transactions = [];
            foreach ($entries as $entry) {
                $transactions[] = [
                    "price" => $entry->food->price,
                    "quantity" => $entry->quantity,
                    "user_id" => Auth::user()->id,
                    "food_id" => $entry->food->id,
                ];

                // update quantities of foods
                $entry->food->quantity = $entry->food->quantity - $entry->quantity;
                $entry->food->save();
            }

            DB::table("transactions")->insert($transactions);

            // clear cart
            CartItem::orderBy("id", "desc")->where("user_id", Auth::user()->id)->delete();

            return redirect("/cart")->with("success", "Cart checked out successfully!");
        }
    }
}
