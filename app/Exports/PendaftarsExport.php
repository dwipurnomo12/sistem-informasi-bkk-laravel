<?php

namespace App\Exports;

use App\Models\Lowongan;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendaftarsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $pendaftar;

    public function __construct($pendaftar)
    {
        $this->pendaftar = $pendaftar;
    }


    public function collection()
    {
        return $this->pendaftar->map(function($pendaftar){
            return [
                'kode_pendaftaran'  => $pendaftar->kode_pendaftaran,
                'nama'              => $pendaftar->nama,
                'jurusan'           => $pendaftar->jurusan,
                'asal_sekolah'      => $pendaftar->asal_sekolah,
                'jenis_kelamin'     => $pendaftar->jenis_kelamin
            ];
        });
    }
}
