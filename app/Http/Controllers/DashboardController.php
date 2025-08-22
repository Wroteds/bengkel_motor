<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        return view('user.booking.utama'); // sesuaikan dengan nama blade view kamu
    }
}
