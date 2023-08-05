<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;


class DashboardLamaranController extends Controller
{
    public function index()
    {
        return view('dashboard.lamaran.index', [
            'users'     => Auth::user(),
            'lamaran'   => Pendaftar::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function edit(Pendaftar $pendaftar, Lowongan $lowongan)
    {
        $pendaftar = Pendaftar::where('user_id', auth()->user()->id)->first();
        return view('/dashboard/lamaran/edit', [
            'users'     => Auth::user(),
            'pendaftar' => $pendaftar,
            'lowongan'  => $lowongan
        ]);
    }

    public function cetak(Pendaftar $pendaftar, Lowongan $lowongan)
    {
        $pendaftar = Pendaftar::where('user_id', auth()->user()->id)->first();

        $logoBKKPath    = storage_path('/app/public/logo/LogoBKK.jpeg');
        $logoBKK        = base64_encode(file_get_contents($logoBKKPath));

        $logoSekolahPath    = storage_path('/app/public/logo/LogoSekolah.jpeg');
        $logoSekolah        = base64_encode(file_get_contents($logoSekolahPath));

        $user = auth()->user();
        if ($user->foto) {
            $fotoPesertaPath = storage_path('app/public/' . $user->foto);
        } else {
            $fotoPesertaPath = storage_path('app/public/foto/user.png');
        }
        $fotoPeserta       = base64_encode(file_get_contents($fotoPesertaPath));

        $pdf = PDF::loadview('dashboard.lamaran.cetak', [
            'users'         => Auth::user(),
            'pendaftar'     => $pendaftar,
            'lowongan'      => $lowongan,
            'logoBKK'       => $logoBKK,
            'logoSekolah'   => $logoSekolah,
            'fotoPeserta'   => $fotoPeserta
        ]);

        return $pdf->stream('kartu-peserta.pdf');
    }

    public function update(Request $request, Pendaftar $pendaftar)
    {
        $rules = [
            'nama'          => 'required',
            'jurusan'       => 'required',
            'asal_sekolah'  => 'required',
            'jenis_kelamin' => 'required',
            'lowongan_id'   => 'required'
        ];

        $validated = $request->validate($rules);
        $validated['user_id'] = auth()->user()->id;
        
        $kodePendaftaran = $pendaftar->kode_pendaftaran;
        $pendaftar->kode_pendaftaran = $kodePendaftaran;

        Pendaftar::where('user_id', auth()->user()->id)->first()
            ->update($validated);
        
        Alert::success('Berhasil !', 'Berhasil Mengedit Data Lamaran Anda');
        return redirect('/dashboard/lamaran');    
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();

        Alert::success('Berhasil', 'Data Pendaftar berhasil dihapus');
        return redirect('/dashboard/lamaran');
    }


}
