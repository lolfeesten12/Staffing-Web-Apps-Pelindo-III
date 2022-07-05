<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardHRDController extends Controller
{
    public function index()
    {
        return view('user-views.pages.dashboardhrd');
    }
}
