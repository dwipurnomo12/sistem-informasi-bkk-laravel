<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    public function informasi()
    {
        $informasi = Informasi::orderBy('id', 'DESC')->paginate(10);
        return view('informasi.informasi', [
            'informasis' => $informasi
        ]);
        
    }

    public function show(Informasi $informasi)
    {
        return view('informasi.show', [
            'informasi' => $informasi
        ]);
    }


}
