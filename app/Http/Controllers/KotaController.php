<?php

namespace App\Http\Controllers;

use App\Models\kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KotaController extends Controller
{
    public function kota(){
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }
        $kota = kota::all();

        return view('kota', ['all' => $kota]);
    }

    public function addKota(){
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }

        return view('add-kota');
    }

    public function doAddKota(Request $request){
        $validated = Validator::make($request->all(),[
            'nama_kota' => 'required'
        ]);

        if ($validated->fails()){
            dd($validated->errors());
        }

        kota::create([
            'nama_kota' => $request->nama_kota

        ]);

        return redirect()->route('kota');
    }

    public function hapusKota($id)
    {
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }
        // return $id;
        // dd($id);
        // Cari data berdasarkan ID
        $kota = kota::where("id_kota",$id)->first();

        if (!$kota) {
            dd($kota);
        }

        // Hapus data
        $kota->delete();

        return redirect()->route('kota');
    }

    public function edit($id){
        return $id;
    }

    public function editKota($id){
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }
        $kota = kota::where('id_kota', $id)->first();

        return view('edit-kota', ['all' => $kota, 'id'=> $id]);
    }

    public function doEditKota(Request $request, $id){
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }

        // Validasi input
        $validated = $request->validate([
            'nama_kota' => 'required',
        ]);

        kota::where("id_kota",$id)->first()->update($validated);

        return redirect()->route('kota');
    }
}
