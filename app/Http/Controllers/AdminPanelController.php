<?php

namespace App\Http\Controllers;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
}
