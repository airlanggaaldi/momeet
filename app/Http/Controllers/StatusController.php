<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\Order;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function pending(){
        if(Auth::user()->akses != 'admin'){
            return redirect()->route('home');
        }

        $property = property::all();

        return view('pending', ['all' => $property]);
    }
    public function approve($id){
        $property = property::where('id_properti', $id)->first();

        $property->status = 'approved';

        $property->save();

        return redirect()->route('pending');
    }
    public function reject($id){
        $property = property::where('id_properti', $id)->first();

        $property->status = 'reject';

        $property->save();

        return redirect()->route('pending');
    }
    public function acc($id){
        $order = Order::where('id_order', $id)->first();

        $order->status = 'accepted';

        $order->save();

        return redirect()->back();
    }
    public function cancel($id){
        $order = Order::where('id_order', $id)->first();

        $order->status = 'canceled';

        $order->save();

        return redirect()->back();
    }
}
