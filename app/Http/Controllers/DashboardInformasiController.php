<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.informasi.index', [
            'users'         => Auth::user(),
            'informasis'    => Informasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.informasi.create', [
            'users' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => 'required',
            'slug'          => 'required|unique:informasis',
            'deskripsi'     => 'required',
            'file'          => 'mimes:xlsx,xls,doc,docx,pdf'
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('file-informasi/' .$fileName, file_get_contents($file));
            $validated['file'] = 'file-informasi/' .$fileName;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->deskripsi), 50);
    
        Informasi::create($validated);
        Alert::success('Berhasil', 'informasi berhasil ditambahkan!');
        return redirect('/dashboard/informasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        return view('dashboard.informasi.show', [
            'users' => Auth::user(),
            'informasi' => $informasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('dashboard.informasi.edit', [
            'users' => Auth::user(),
            'informasi' => $informasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        $rules = [
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'file'          => 'mimes:xlsx,xls,doc,docx,pdf'
        ];

        if($request->slug != $informasi->slug){
            $rules['slug'] = 'required|unique:informasis';
        }
        else {
            $rules['slug'] = 'required';
        }

        $validated = $request->validate($rules);

        if($request->hasFile('file')){
            if($informasi->file){
                Storage::delete($informasi->file);
            }
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('file-informasi/' .$fileName, file_get_contents($file));
            $validated['file'] = 'file-informasi/' .$fileName;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->deskripsi), 100);

        Informasi::where('id', $informasi->id)
            ->update($validated);

            Alert::success('Berhasil !', 'Berhasil Mengedit Informasi');
            return redirect('/dashboard/informasi');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        if($informasi->file){
            Storage::delete($informasi->file);
        }

        Informasi::destroy($informasi->id);
        Alert::success('Berhasil !', 'Informasi berhasil dihapus');
        return redirect('dashboard/informasi');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Informasi::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
