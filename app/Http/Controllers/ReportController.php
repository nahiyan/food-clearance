<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view("admin.reports.create", ["type" => Auth::user()->type]);
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
            'body' => 'required|max:255'
        ]);

        $entry = Report::create($request->all());

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
