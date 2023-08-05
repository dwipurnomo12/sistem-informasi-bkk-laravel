<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardProfilController extends Controller
{
    public function index()
    {
        return view('dashboard.profil.index', [
            'users' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $rules = [
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'foto'  => 'image|mimes:jpg,jpeg,png'
        ];

        if($request->filled('password')){
            $rules['password']  = 'required|min:8';
        }

        $validated = $request->validate($rules);

        if($request->hasFile('foto')){
            if($user->foto){
                Storage::delete($user->foto);
            }
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('foto/'.$fileName, file_get_contents($file));
            $validated['foto'] = 'foto/'.$fileName;
        }

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        User::where('id', $user->id)
            ->update($validated);

        Alert::success('Berhasil !', 'Berhasil Memperbarui Profil');
        return redirect('/dashboard/profil');   
    }
}
