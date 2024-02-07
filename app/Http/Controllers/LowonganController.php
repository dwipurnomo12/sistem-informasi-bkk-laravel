<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LowonganController extends Controller
{
    public function lowongan()
    {
        $lowongans = Lowongan::orderBy('id', 'DESC')->paginate(6);
        return view('lowongan.lowongan',[
            'lowongans' => $lowongans
        ]);
    }

    public function show(Lowongan $lowongan)
    {
        return view('lowongan.show', [
            'lowongan'   => $lowongan,
        ]);
    }
}
