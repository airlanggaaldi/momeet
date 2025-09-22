<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\property;
use App\Models\rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function booking($id){
        $property = property::where('id_properti', $id)->first();
        $order = Order::where('id_properti', $id)->get();
        $userOrder = User::all();

        return view('booking', ['property' => $property, 'order' => $order, 'userOrder' => $userOrder]);
    }

    public function orderProperties(Request $request, $id){ //$id adalah id properti
        $validated = Validator::make($request->all(),[
            'tanggal' => 'required|date',
            'jam' => 'required'
        ]);

        if ($validated->fails()){
            dd($validated->errors());
        }

        $data = Order::where('tanggal', $request->tanggal)
                        ->where('jam', $request->jam)
                        ->where('id_properti', $id)
                        // ->where('status', 'pending')->orWhere('status', 'accepted')
                        // ->orWhere(function ($query) {
                        //     $query->where('status', 'pending')
                        //           ->where('status', 'accepted');
                        // })
                        ->orderBy('created_at', 'desc')
                        ->first();
                        // dd($data);
        if ($data != null){
            // dd($data);
            if ($data->status == 'pending' || $data->status == 'accepted'){
                return redirect()->back()->with('msg', 'Sudah Dibooking!');
            }
        }

        Order::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'id_properti' => $id,
            'id_user' => Auth::user()->id,
            'rating' => 0,
            'status' => 'pending'
        ]);

        return redirect()->route('order');
    }

    public function myOrder(){
        $user = Auth::user()->id;

        $users = User::all();
        $myOrder = Order::with("properties")->where('id_user', $user)->get();
        // dd($myOrder->first()->properties);

        return view('myOrder', ['myOrder' => $myOrder, 'users' => $users]);
    }

    public function propertiOrder($id){
        $getProperti = property::where('id_properti', $id)->first();
        $propertiOrder = Order::with("properties")->where('id_properti', $id)->get();
        $userOrder = User::all();

        return view('properti-order', [
            'id' => $id,
            'propertiOrder' => $propertiOrder,
            'userOrder' => $userOrder,
            'getProperti' => $getProperti
        ]);
    }

    public function adminOrder(){
        $propertiOrder = Order::with("properties")->orderBy('created_at', 'desc')->get();
        $userOrder = User::all();

        return view('admin-order', [
            'propertiOrder' => $propertiOrder,
            'userOrder' => $userOrder
        ]);
    }

    public function review($id){
        $propertiOrder = Order::with("properties")->where('id_order', $id)->first();
        return view('review', ['propertiOrder' => $propertiOrder, 'id' => $id]);
    }

    public function complete(Request $request ,$id){
        $order = Order::where('id_order', $id)->first();
        $n = Order::where('id_properti', $order->id_properti)->where('status', 'completed')->count(); //jumlah order properti
        // save to orders

        if($request->rating != null){
            $order->rating = $request->rating;
        } else {
            $order->rating = 0;
        }
        $order->review = $request->review;
        $order->status = 'completed';

        $order->save();

        // save rating properti
        $properti = property::where('id_properti', $order->id_properti)->first();
        // dd($n);
        $rating = ($properti->rating + $order->rating)/($n+1);
        // dd($rating);

        $properti->rating = $rating;
        $properti->save();

        return redirect()->route('myOrder', $id);
    }
}
