<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;



class DashboardLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.lowongan.index',[
            'users' => Auth::user(),
            'lowongans' => Lowongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lowongan.create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => 'required',
            'slug'          => 'required|unique:lowongans',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
            'gambar'        => 'image|file'
        ]);

        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambar-lowongan/'.$fileName, file_get_contents($file));
            $validated['gambar'] = 'gambar-lowongan/'.$fileName;
        }
        
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->persyaratan), 100);

        Lowongan::create($validated);
        Alert::success('Berhasil', 'Lowongan berhasil dibuat!');
        return redirect('/dashboard/lowongan');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        return view('dashboard.lowongan.show', [
            'users' => Auth::user(),
            'lowongan' => $lowongan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        return view('/dashboard/lowongan/edit', [
            'users' => Auth::user(),
            'lowongan' => $lowongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $rules = [
            'judul'         => 'required',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
            'gambar'        => 'image|file'
        ];

        if($request->slug != $lowongan->slug){
            $rules['slug'] = 'required|unique:lowongans';
        }
        else {
            $rules['slug'] = 'required';
        }

        $validated = $request->validate($rules);

        if($request->hasFile('gambar')){
            if($lowongan->gambar){
                Storage::delete($lowongan->gambar);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambar-lowongan/'.$fileName, file_get_contents($file));
            $validated['gambar'] = 'gambar-lowongan/'.$fileName;
        }

        $validated['user_id'] = auth()->user()->id;

        Lowongan::where('id', $lowongan->id)
            ->update($validated);

        Alert::success('Berhasil !', 'Berhasil Mengedit Lowongan');
        return redirect('/dashboard/lowongan');    
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        if($lowongan->gambar){
            Storage::delete($lowongan->gambar);
        }

        Lowongan::destroy($lowongan->id);
        Alert::success('Berhasil', 'Lowongan berhasil dihapus');
        return redirect('dashboard/lowongan');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
