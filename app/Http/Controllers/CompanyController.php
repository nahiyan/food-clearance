<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == "admin") {
            $entries = Company::orderBy("id", "desc")->get();
        } else {
            $entries = Auth::user()->companies;
        }

        return view("admin.companies.index", ["entries" => $entries, "type" => Auth::user()->type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view("admin.companies.create", ["users" => $users, "type" => Auth::user()->type]);
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
            $user_id_rule = 'required|numeric|exists:users,id';
        } else {
            $user_id_rule = 'required|numeric|in:' . Auth::user()->id;
        }

        $request->validate([
            'name' => 'required|unique:companies|max:255',
            'user_id' => $user_id_rule,
        ]);

        $entry = Company::create($request->all());

        return redirect("/" . Auth::user()->type . "/companies")->with("success", "Created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view("admin.companies.show")->with("entry", $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (Auth::user()->type == "company" && $company->user->id != Auth::user()->id) {
            return redirect("/company/companies")->with("danger", "You do not have the permission to edit this company.");
        }

        $users = User::all();

        return view("admin.companies.edit", ["users" => $users, "entry" => $company, "type" => Auth::user()->type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if (Auth::user()->type == "company" && $company->user->id != Auth::user()->id) {
            return redirect("/company/companies")->with("danger", "You do not have the permission to edit this company.");
        }

        if (Auth::user()->type == "admin") {
            $user_id_rule = 'required|numeric|exists:users,id';
        } else {
            $user_id_rule = 'required|numeric|in:' . Auth::user()->id;
        }

        $request->validate([
            'name' => 'required|unique:companies,name,' . $company->id . '|max:255',
            'user_id' => $user_id_rule,
        ]);

        $company->update($request->all());

        return redirect("/" . Auth::user()->type . "/companies")->with("success", "Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (Auth::user()->type == "company" && $company->user->id != Auth::user()->id) {
            return redirect("/company/companies")->with("danger", "You do not have the permission to delete this company.");
        }

        $company->delete();

        return redirect("/" . Auth::user()->type . "/companies")->with("success", "Deleted successfully!");
    }
}
