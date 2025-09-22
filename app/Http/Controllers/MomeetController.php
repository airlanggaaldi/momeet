<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use App\Models\iklan;
use App\Models\property;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MomeetController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function contact(Request $request){
        contactUs::create([
            'pesan' => $request->pesan,
            'id_user' => Auth::id()
        ]);

        return redirect()->route('contactUs');
    }
    public function showContact(){
        $contact = contactUs::all();
        $user = User::all();

        return view('admin-contact', ['contact'=>$contact, 'user'=>$user]);
    }

    public function approveAds(){
        if(Auth::user()->akses != 'admin'){
            return redirect()->back();
        }
        $ads = iklan::all();
        $property = property::all();

        return view('admin-ads', ['ads' => $ads, 'property' => $property]);
    }

    public function approvingAds($id){
        $ads = iklan::where('id_iklan', $id)->first();

        $ads->status = 'approve';
        $ads->save();

        return redirect()->back();
    }
    public function rejectingAds($id){
        $ads = iklan::where('id_iklan', $id)->first();

        $ads->status = 'reject';
        $ads->save();

        return redirect()->back();
    }

}
