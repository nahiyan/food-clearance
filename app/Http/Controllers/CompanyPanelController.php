<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyPanelController extends Controller
{
    public function index()
    {
        $food_count = DB::table("foods")
            ->leftJoin("companies", "companies.id", "=", "foods.company_id")
            ->leftJoin("users", "companies.user_id", "=", "users.id")
            ->where("companies.user_id", Auth::user()->id)
            ->count();

        $company_count = DB::table("companies")
            ->where("user_id", Auth::user()->id)
            ->count();

        $transaction_count = DB::table("transactions")
            ->leftJoin("foods", "transactions.food_id", "=", "foods.id")
            ->leftJoin("companies", "companies.id", "=", "foods.company_id")
            ->leftJoin("users", "companies.user_id", "=", "users.id")
            ->where("companies.user_id", Auth::user()->id)
            ->count();

        return view("company.index", ["food_count" => $food_count, "company_count" => $company_count, "transaction_count" => $transaction_count]);
    }
}
