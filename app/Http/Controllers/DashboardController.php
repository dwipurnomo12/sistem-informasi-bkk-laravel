<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lowongan;
use App\Models\Informasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'users'             => Auth::user(),
            'totalLowongan'     => Lowongan::all()->count(),
            'totalUser'         => User::where('role_id', 1)->count(),
            'totalInformasi'    => Informasi::all()->count()
        ]);
    }
}
