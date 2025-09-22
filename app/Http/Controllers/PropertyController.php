<?php

namespace App\Http\Controllers;

use App\Models\iklan;
use App\Models\kota;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function addProperties(){
        $kota = kota::all();
        return view('add-properties', ['kota' => $kota]);
    }

    public function update($id){
        return $id;
    }
    public function updateForm($id){
        $property = property::where("id_properti",$id)->first();

        $kota = kota::all();

        return view('edit-properties', ['property' => $property, 'kota' => $kota, 'id' => $id]);
    }

    public function hapus($id)
    {
        // return $id;
        // dd($id);
        // Cari data berdasarkan ID
        $property = property::where("id_properti",$id)->first();

        if (!$property) {
            dd($property);
        }

        Storage::delete($property->gambar);

        // Hapus data
        $property->delete();

        return redirect()->route('properties');
    }

    public function updateProperties(Request $request, $id)
    {
        $oldData = property::where("id_properti",$id)->first();
        // Validasi input
        $validated = $request->validate([
            'nama_properti' => 'required',
            'harga' => 'numeric|required',
            'kapasitas' => 'numeric|required',
            'deskripsi' => 'required',
            'gambar' => 'file|image|max:5120',
            'jenis_properti' => 'required'
        ]);

        $validated['status'] = "pending";


        if ($request->gambar != null) {
            if ($oldData->gambar) {
                Storage::delete($oldData->gambar);
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/properties/images', $gambar->hashName());
                $validated['gambar'] = $gambar->hashname();
            }
        }

        //update status
        // $property = property::where('id_properti', $id)->first();
        // $property->status = 'pending';
        // $property->save();
        $data = property::where("id_properti",$id)->first()->update($validated);

        return redirect()->route('properties');
    }

    public function doAddProperties(Request $request){
        // dd($request);
        $validated = Validator::make($request->all(),[
            'nama_properti' => 'required',
            'harga' => 'numeric|required',
            'kapasitas' => 'numeric|required',
            'deskripsi' => 'required',
            'gambar' => 'required|file|image|max:5120',
            'jenis_properti' => 'required'
        ]);

        if ($validated->fails()){
            dd($validated->errors());
        }

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/properties/images', $gambar->hashName());

        Property::create([
            'nama_properti' => $request->nama_properti,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->hashName(),
            'rating' => 0,
            'status' => 'pending',
            'jenis_properti' => $request->jenis_properti,
            'id_user' => Auth::id(),
            'id_kota' => $request->kota
        ]);

        return redirect()->route('properties');
    }

    public function properties(){
        // return 'Id = '.$request->input('id');
        if(Auth::user()->akses != 'provider'){
            return redirect()->route('home');
        }

        $properties = Property::where('id_user', Auth::id())
        ->get();

        $iklan = iklan::all();

        return view(
            'properties',
            [
                'properties' => $properties,
                'iklan' => $iklan
            ]
        );
    }

    //ads

    public function ads($id){
        $properties = Property::where('id_properti', $id)->first();

        $kota = kota::all();

        return view('ads', ['property' => $properties, 'id' => $id, 'kota' => $kota]);
    }

    public function addAds($id, Request $request){
        $validated = Validator::make($request->all(),[
            'poster' => 'required|file|image|max:5120',
        ]);

        if ($validated->fails()){
            dd($validated->errors());
        }

        $poster = $request->file('poster');
        $poster->storeAs('public/ads/images', $poster->hashName());

        iklan::create([
            'poster' => $poster->hashName(),
            'id_properti' => $id
        ]);

        return redirect()->route('properties');
    }

    public function hapusAds($id){
        $iklan = iklan::where("id_iklan", $id)->first();
        // dd($iklan);
        if (!$iklan) {
            dd($iklan);
        }

        Storage::delete($iklan->poster);

        // Hapus data
        $iklan->delete();

        return redirect()->route('approveAds');
    }
}
