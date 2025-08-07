<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $user = auth()->user();
         $riwayatServis = $user->riwayatServis()->latest()->get();

        return view('dashboard.user_dashboard', compact('user', 'riwayatServis'));

    }

    public function adminDashboard()
    {
        return view('dashboard.admin_dashboard');
    }
}