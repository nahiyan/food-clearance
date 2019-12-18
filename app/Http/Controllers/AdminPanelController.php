<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function index()
    {
        $user_count = DB::table("users")->count();

        $general_user_count = DB::table("users")->where("type", "general")->count();

        $admin_count = DB::table("users")->where("type", "admin")->count();

        $company_user_count = DB::table("users")->where("type", "company")->count();

        $food_count = DB::table("foods")->count();

        $company_count = DB::table("companies")->count();

        $transaction_count = DB::table("transactions")->count();

        $transaction_income = DB::table("transactions")->sum(DB::raw("price * quantity * 0.1"));

        return view("admin.index", [
            "user_count" => $user_count,
            "general_user_count" => $general_user_count,
            "admin_count" => $admin_count,
            "company_user_count" => $company_user_count,
            "food_count" => $food_count,
            "company_count" => $company_count,
            "transaction_count" => $transaction_count,
            "transaction_income" => $transaction_income,
        ]);
    }
}
