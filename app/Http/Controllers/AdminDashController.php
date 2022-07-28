<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function admindash()
    {
        return view('admin.dashboard.admin')->with([]);
    }
}
