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
        $riwayatservis = $user->riwayatServis()->latest()->get();

        return view('dashboard_user', compact('user', 'riwayatservis'));
    }

    public function adminDashboard()
    {
        return view('dashboard.admin_dashboard');
    }
}