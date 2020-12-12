<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = User::orderBy("id", "desc")->get();

        return view("admin.users.index")->with("entries", $entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create", ["type" => Auth::user()->type]);
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
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password',
            'type' => 'required|in:general,admin,company',
        ]);

        $request->merge(
            [
                "password" => Hash::make($request->input("password")),
            ]
        );

        $entry = User::create($request->all());

        return redirect("admin/users/")->with("success", "Created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.edit")->with("entry", $user)->with("type", Auth::user()->type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id . '|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable',
            'password_confirmation' => 'nullable|required_with:password|same:password',
            'type' => 'required|in:general,admin,company',
        ]);

        $password = $request->input("password");
        $password_confirmation = $request->input("password_confirmation");

        $all_input = $request->all();
        if ($password != null) {
            $all_input["password"] = Hash::make($password);
        } else {
            $all_input["password"] = $user->password;
        }

        $user->update($all_input);

        return redirect("admin/users/")->with("success", "Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect("admin/users/")->with("success", "Deleted successfully!");
    }
}
