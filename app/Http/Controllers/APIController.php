<?php

namespace App\Http\Controllers;

use App\Models\bookmark;
use App\Models\kota;
use App\Models\Order;
use App\Models\property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    public function kota(){
        // if(Auth::user()->akses != 'admin'){
        //     return redirect()->route('home');
        // }
        $kota = kota::all();

        return $kota;
    }

    // public function detail(Request $request) {
    //     $detail = kota::where('id_kota', $request->input('id_kota'))->first();

    //     if($detail === NULL)
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Data Not Found!'
    //         ]);

    //     return response()->json([
    //         'status' => 'ok',
    //         'data' => $detail
    //     ]);
    // }

    public function add_sample(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kota' => 'required|max:100',
            // 'hp' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $obj = new kota;
        $obj->nama_kota = $request->input('nama_kota');
        // $obj->hp = $request->input('hp');
        $obj->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function properties(){
        $all = property::where('status', 'approved')->get();

        if(count($all) == 0) {
            return response()->json([
                'status' => 'failed',
                'all' => 'data tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'all' => $all
        ]);
    }
    public function best_seller(){
        //most popular
        $browser_total_raw = DB::raw('count(*) as total_order');
        $most = Order::getQuery()
            ->select('id_properti',$browser_total_raw)
            ->groupBy('id_properti')
            ->orderBy('total_order', 'desc')
            ->take(2)
            ->get();
        $mostProperties = [];
        foreach ($most as $m) {
            $property = Property::where('id_properti', $m->id_properti)->first();

            $mostProperties[] = $property;

        }

        if(count($mostProperties) == 0) {
            return response()->json([
                'status' => 'failed',
                'all' => 'data tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'all' => $mostProperties
        ]);
    }
    public function detail(){
        $property = property::where('id_properti', request('id'))->first();

        if($property === NULL)
        return response()->json([
            'status' => 'error',
            'message' => 'Data Not Found!'
        ]);

        return response()->json([
            'status' => 'ok',
            'property' => $property
        ]);
    }

    public function favorite(){
        $bookmark = bookmark::where('id_user', request('id'))->get();
        // $property = property::all();

        $favorite = [];
        foreach ($bookmark as $m) {
            $p = Property::where('id_properti', $m->id_properti)->first();

            $favorite[] = $p;
        }

        // return view('bookmark', ['bookmark'=>$bookmark, 'property'=>$property]);
        return response()->json([
            'status' => 'ok',
            'favorite' => $favorite
        ]);
    }

    public function history(){
        // $user = Auth::user()->id;

        // $users = User::all();
        $history = Order::with("properties")->where('id_user', request('id'))->get();
        // dd($myOrder->first()->properties);

        return response()->json([
            'status' => 'ok',
            'history' => $history
        ]);
    }

    public function user(){
        $user = User::where('id', request('id'))->first();

        return response()->json([
            'status' => 'ok',
            'user' => $user
        ]);
    }

    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_properti' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()
            ]);
        }

        $obj = new order;
        $obj->id_properti = $request->input('id_properti');
        $obj->id_user = $request->input('id_user');
        $obj->tanggal = $request->input('tanggal');
        $obj->jam = $request->input('jam');
        $obj->status = 'pending';
        $obj->rating = 0;
        $obj->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nomor_telp' => 'required',
            'akses' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()
            ]);
        }

        $obj = new User;
        $obj->akses = $request->input('akses');
        $obj->username = $request->input('username');
        $obj->email = $request->input('email');
        $obj->nomor_telp = $request->input('nomor_telp');
        $obj->password = bcrypt($request->input('password'));
        $obj->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}