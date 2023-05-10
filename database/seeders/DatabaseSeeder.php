<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Pendaftar;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 1 
        ]);

        User::create([
            'name'      => 'Dwi',
            'email'     => 'purnomodwi174@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 2
        ]);

        User::create([
            'name'      => 'Mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 2
        ]);

        // Pendaftar::create([
        //     'nomor_urut'    => 1,
        //     'nama'          => 'Dwi Purnomo',
        //     'jurusan'       => 'Teknik Kendaraan Ringan',
        //     'asal_sekolah'  => 'SMK N 8 Purworejo',
        //     'jenis_kelamin' => 'laki-laki',
        //     'lowongan_id'   => 1,
        //     'user_id'       => 2
        // ]);
        
        // Pengumuman::create([
        //     'judul'     => 'Pendaftar PT Pama Persada',
        //     'slug'      => 'pengumuman-pt-pama-persada',
        //     'deskripsi' => 'Pengumuman bagi yang mendaftar di PT Pama Persada untuk jadwal pelaksanaan tes adalah',
        //     'excerpt'   => 'Pengumuman bagi yang mendaftar di PT Pama Persada',
        //     'file'      => null,
        //     'user_id'   => 1
        // ]);
    }
}
