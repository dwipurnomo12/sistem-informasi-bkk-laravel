<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lowongan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Exports\PendaftarsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataPendaftarController extends Controller
{
    public function index()
    {
        return view('dashboard.pendaftar.index', [
            'users'     => Auth::user(),
            'lowongans' => Lowongan::all()
        ]);
    }

    // Untuk menampilkan Data Pelamar 
    public function pendaftar(Lowongan $lowongan)
    {
        return view('dashboard.pendaftar.list', [
            'users'     => Auth::user(),
            'lowongan'  => $lowongan
        ]);
    }

    public function exportexcel(Request $request, $lowongan_id)
    {
        $pendaftar = Pendaftar::where('lowongan_id', $lowongan_id)->get();

        return Excel::download(new PendaftarsExport($pendaftar), 'data-pendaftar.xlsx');
    }
}
