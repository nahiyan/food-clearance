<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == "company") {
            $entries = [];

            $entries = DB::table("transactions")
                ->leftJoin("foods", "transactions.food_id", "=", "foods.id")
                ->leftJoin("companies", "foods.company_id", "=", "companies.id")
                ->leftJoin("users", "transactions.user_id", "=", "users.id")
                ->where("companies.user_id", "=", Auth::user()->id)
                ->select("transactions.*", "users.name as user_name", "foods.name as food_name")
                ->orderBy("id", "desc")
                ->get();;
        } else {
            $entries = DB::table("transactions")
                ->leftJoin("foods", "transactions.food_id", "=", "foods.id")
                ->leftJoin("users", "transactions.user_id", "=", "users.id")
                ->select("transactions.*", "users.name as user_name", "foods.name as food_name")
                ->orderBy("id", "desc")
                ->get();
        }

        return view("admin.transactions.index", ["entries" => $entries, "type" => Auth::user()->type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        if (Auth::user()->type == "company" && $transaction->food->company->user->id != Auth::user()->id) {
            return redirect("/company/transactions")->with("danger", "You do not have the permission to delete this item.");
        }

        $transaction->delete();

        return redirect("/" . Auth::user()->type . "/transactions")->with("success", "Deleted successfully!");
    }
}
