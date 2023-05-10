<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'newLowongan' => Lowongan::orderBy('id', 'desc')->take(3)->get(),
            'titleHero' => "Sistem informasi BKK"
        ]);
    }

    
}
