<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function printPdf(Lowongan $lowongan)
    {
        $logoBKKPath    = storage_path('/app/public/logo/LogoBKK.jpeg');
        $logoBKK        = base64_encode(file_get_contents($logoBKKPath));

        $logoSekolahPath    = storage_path('/app/public/logo/LogoSekolah.jpeg');
        $logoSekolah        = base64_encode(file_get_contents($logoSekolahPath));

        $pdf = PDF::loadView('dashboard.pendaftar.print-pdf', [
            'users'         => Auth::user(),
            'lowongan'      => $lowongan,
            'logoBKK'       => $logoBKK,
            'logoSekolah'   => $logoSekolah,
        ]);

        return $pdf->stream('data-pendaftar.pdf');
    }

    public function exportexcel(Request $request, $lowongan_id)
    {
        $pendaftar = Pendaftar::where('lowongan_id', $lowongan_id)->get();

        return Excel::download(new PendaftarsExport($pendaftar), 'data-pendaftar.xlsx');
    }
}
