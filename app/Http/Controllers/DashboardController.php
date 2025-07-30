<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        return view('dasboard.user_dashboard');
    }

    public function adminDashboard()
    {
        return view('dashboards.admin_dashboard');
    }
}