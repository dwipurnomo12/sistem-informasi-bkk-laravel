<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Informasi BKK (Bursa Kerja Khusus)


Sistem informasi BKK (Bursa Kerja Khusus) adalah sebuah sistem informasi yang dibangun untuk membantu proses perekrutan dan penempatan tenaga kerja di Indonesia. BKK sendiri adalah sebuah lembaga yang memiliki tugas untuk membantu memfasilitasi penempatan tenaga kerja di perusahaan-perusahaan yang membutuhkan.



## Fitur
1. Halaman Depan
    - Menu Home, menampilkan informasi web dan lowongan terbaru
    - Menu Lowongan, menampilkan semua lowongan yang tersedia
    - Menu Informasi, menampilkan semua informasi

2. Dashboard Admin
    - Manajemen Lowongan
    - Manajemen Informasi/Pengumuman
    - Melihat data pendaftar berdasarkan perusahaan
    - Cetak data pendaftar berdasarkan perusahaan

3. Dashboard Pendaftar
    - Melihat daftar lowongan yang tersedia
    - Mendaftar lowongan
    - Melihat data lamaran
    - Cetak kartu peserta



## Teknologi

Sistem Informasi Inventory Gudang menggunakan beberapa Teknologi diantaranya :

- Laravel - The PHP Framework for Web Artisans
- JavaScript - JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.
- Bootstrap - Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. 



## Installasi

Lakukan Clone Project/Unduh manual .

Aktifkan Xampp Control Panel, lalu akses ke http://localhost/phpmyadmin/.

Buat database dengan nama 'bkk'.

Jika melakukan Clone Project, rename file .env.example dengan env dan hubungkan
database nya dengan mengisikan nama database, 'DB_DATABASE=bkk'.


Kemudian, Ketik pada terminal :
```sh
php artisan migrate
```

Lalu ketik juga

```sh
php artisan migrate:fresh --seed
```

Jalankan aplikasi 

```sh
php artisan serve
```

Akses Aplikasi di Web browser 
```sh
127.0.0.1:8000
```



![Screenshot_941](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/a8b7291b-d5b4-4fd0-9ba9-9685bb17eedd)

![Screenshot_942](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/a2483bac-50ed-43a8-8e11-e53161c8028e)

![Screenshot_943](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/50afb82b-ff8b-4416-8020-65699d15b138)

![Screenshot_944](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/92c87db1-ba09-4226-b5b7-5fe7b989e960)

![Screenshot_945](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/81b06532-d109-44c4-bc29-91caa5dca1a5)

![Screenshot_946](https://github.com/dwipurnomo12/sistem-informasi-bkk-laravel/assets/105181667/31211518-8494-4d75-93d5-3bc7bc241c5d)
