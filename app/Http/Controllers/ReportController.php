<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Food;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = DB::table("reports")
            ->leftJoin("foods", "reports.food_id", "=", "foods.id")
            ->leftJoin("companies", "reports.company_id", "=", "companies.id")
            ->leftJoin("users", "reports.user_id", "=", "users.id")
            ->select("reports.*", "users.name as user_name", "foods.name as food_name", "companies.name as company_name")
            ->orderBy("id", "desc")
            ->get();

        return view("admin.reports.index", ["entries" => $entries, "type" => Auth::user()->type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("reports.create", ["type" => Auth::user()->type, "companies" => Company::all(), "foods" => Food::all()]);
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
            'type' => 'required',
            'body' => 'required|max:255',
            'target-food' => 'required',
            'target-company' => 'required'
        ]);

        if ($request->type == 'food')
            $request->merge(['food_id' => Food::findOrFail($request['target-food'])->id]);
        else
            $request->merge(['company_id' => Company::findOrFail($request['target-company'])->id]);

        $request->merge(['user_id' => Auth::id()]);

        Log::debug($request);

        Report::create($request->all());

        return redirect("/")->with("success", "Reported successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect("/" . Auth::user()->type . "/reports")->with("success", "Deleted successfully!");
    }
}
