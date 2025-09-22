<?php

namespace App\Http\Controllers;

use App\Models\bookmark;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\iklan;
use App\Models\kota;
use App\Models\Order;
use App\Models\User;
use App\Models\Property;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

class AccountController extends Controller
{
    /**
     * Fungsi Untuk Login
     */
    public function login(Request $request){
        return view('login');
    }

    public function order(Request $request){
        if (request('search')){
            $all = property::where('status', 'approved')->where('nama_properti', 'like', '%'.request('search').'%')->get();
        }else{
            $all = property::where('status', 'approved')->get();
        }
        return view('order', [
            'all' => $all
        ]);
    }

    public function signup(Request $request){
        return view('signup');
    }

    public function do_signup(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required|min:4|max:255',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email:dns',
            'akses' => 'required',
            'nomor_telp' => 'required|max:13'
        ]);

        $cek = User::where('username', $request->username)->first();
        if($cek != null){
            return back()->withErrors([
                'Username Sudah Ada'
            ]);
        }

        User::create([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'akses' => $request->akses,
            'nomor_telp' => $request->nomor_telp
        ]);

        return redirect()->route('login');
    }

    public function show(){
        // return 'Id = '.$request->input('id');
        $all = property::where('status', 'approved')->get();
        // dd($all);
        return view(
            'order',
            [
                'all' => $all
            ]
        );
    }

    public function do_login(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required|min:4|max:255',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $obj = User::where('username', $username)
        ->first();
        if(!Hash::check($password, $obj->password)){
            return back()->withErrors([
                'Wrong password'
            ]);
        }

        if($obj === NULL){
            return back()->withErrors([
                'Wrong username / password'
            ]);
        }


        Auth::loginUsingId($obj->id, true);
        // redirect()->route('properties');
        return redirect()->route('home');
    }

    public function home(){
        $username = Auth::user();
        // dd($username);
        $property = property::all();
        $propertyProvider = property::where('id_user', Auth::id())->where('status', 'approved')->get();

        // most popular
        $browser_total_raw = DB::raw('count(*) as total_order');
        $order = Order::getQuery()
            ->select('id_properti',$browser_total_raw)
            ->groupBy('id_properti')
            ->orderBy('total_order', 'desc')
            ->take(3)
            ->get();

            // dd($order->toSql());

        $totalPesananPropertiSelesai = array();
        $totalPesananProperti = array();
        $propertiHarian = array();
        $notReserved = 0;
        $hasReserved = 0;
        $hasCompleted = 0;
        $pengeluaran = 0;

        if (Auth::user() != null) {
            if (Auth::user()->akses == 'customer' || Auth::user()->akses == 'admin') {
                // Reservasi Belum dibayar
                $notReserved = Order::where('id_user', Auth::id())
                ->where('status', 'pending')
                ->count();
                // dd(Auth::id());

                // Reservasi Sudah dibayar
                $hasReserved = Order::where('id_user', Auth::id())
                ->where('status', 'accepted')
                ->count();

                // Reservasi Sudah Selesai
                $hasCompleted = Order::where('id_user', Auth::id())
                ->where('status', 'completed')
                ->count();

                // Total Sudah Selesai
                $pengeluaran = 0;
                $totalPengeluaranAcc = Order::where('id_user', Auth::id())
                ->where('status', 'accepted')
                ->get();

                foreach ($totalPengeluaranAcc as $tpa) {
                    $properti = Property::where('id_properti', $tpa->id_properti)->first();
                    $pengeluaran += $properti->harga;
                }

                $totalPengeluaranCom = Order::where('id_user', Auth::id())
                ->where('status', 'completed')
                ->get();

                foreach ($totalPengeluaranCom as $tpa) {
                    $properti = Property::where('id_properti', $tpa->id_properti)->first();
                    $pengeluaran += $properti->harga;
                }
            } elseif (Auth::user()->akses == 'provider') {
                // provider total pesanan
                // properti provider
                $propertiProvider = Property::where('id_user', Auth::id())->where('status', 'approved')->get();
                $i = 0;
                foreach ($propertiProvider as $k) {
                    $totalPesananProperti[$i] = $this->hitungPesanan($k->id_properti);
                    $totalPesananPropertiSelesai[$i] = $this->hitungPesananSelesai($k->id_properti);
                    $i += 1;
                }
                // dd($totalPesananPropertiSelesai);
                $propertiHarian = Order::where('id_user', Auth::id())
                    ->where('status', 'accepted')
                    ->where('tanggal', Carbon::today())
                    ->get();
            }
        }

        // admin
        $i = 0;
        $semuaProperti = Property::where('status', 'approved')->get();
        foreach ($semuaProperti as $k) {
            $pesananSemua[$i] = $this->hitungPesanan($k->id_properti);
            $pesananSemuaSelesai[$i] = $this->hitungPesananSelesai($k->id_properti);
            $i += 1;
        }

        // data harian
        $dataHarian = Order::with("properties")
        ->orderBy('created_at', 'desc')
        ->where('status', 'accepted')
        ->where('tanggal', Carbon::today())
        ->get();

        // data bulanan
        $dataBulanan = Order::with("properties")
        ->orderBy('created_at', 'desc')
        ->where('status', 'accepted')
        ->whereMonth('tanggal', Carbon::now())
        ->whereYear('tanggal', Carbon::now())
        ->get();

        //ads
        $ads = iklan::where('status', 'approve')->get();

        return view('home', [
            'username' => $username,
            'popular' => $order,
            'property' => $property,
            'notReserved' => $notReserved,
            'hasReserved' => $hasReserved,
            'hasCompleted' => $hasCompleted,
            'pengeluaran' => $pengeluaran,
            'totalPesananProperti' => $totalPesananProperti,
            'propertyProvider' => $propertyProvider,
            'semuaProperti' => $semuaProperti,
            'pesananSemua' => $pesananSemua,
            'totalPesananPropertiSelesai' => $totalPesananPropertiSelesai,
            'pesananSemuaSelesai' => $pesananSemuaSelesai,
            'propertiHarian' => $propertiHarian,
            'dataBulanan' => $dataBulanan,
            'dataHarian' => $dataHarian,
            'ads' => $ads
        ]);
    }

    public function getProperty()
    {
        // $data = array();
        $getdata = Order::select('id_properti')
        ->where('status', 'accepted')
        ->where('tanggal', Carbon::today())
        ->groupBy('id_properti')
        ->get();

        // dd($getdata);
        $data = [];

        foreach ($getdata as $k) {
            $property = Property::where('id_properti', $k->id_properti)->where('id_user', Auth::id())->first();
            if ($property != null) {
                $jumlah = Order::where('id_properti', $k->id_properti)
                    ->where('status', 'accepted')
                    ->where('tanggal', Carbon::today())
                    ->count();
                $harga = $jumlah * $property->harga;
                // $data = [$property->nama_properti => $harga];
                array_push($data, [$property->nama_properti => $harga]);
            }
        }


        // $data = ['controller' => $controller];

        // dd($getdata);

        return response()->json($data);
    }
    public function getPropertyBulan()
    {
        // $data = array();
        $getdata = Order::select('id_properti')
        ->where('status', 'accepted')
        ->whereMonth('tanggal', Carbon::now())
        ->whereYear('tanggal', Carbon::now())
        ->groupBy('id_properti')
        ->get();

        // dd($getdata);
        $data = [];

        foreach ($getdata as $k) {
            $property = Property::where('id_properti', $k->id_properti)->where('id_user', Auth::id())->first();
            if ($property != null) {
                $jumlah = Order::where('id_properti', $k->id_properti)
                    ->where('status', 'accepted')
                    ->whereMonth('tanggal', Carbon::now())
                    ->whereYear('tanggal', Carbon::now())
                    ->count();
                $harga = $jumlah * $property->harga;
                // $data = [$property->nama_properti => $harga];
                array_push($data, [$property->nama_properti => $harga]);
            }
        }


        // $data = ['controller' => $controller];

        // dd($data);

        return response()->json($data);
    }
    public function hitungPesanan($id){
        $jumlah = Order::where('id_properti', $id)
            ->where('status', 'pending')
            ->count();
        $jumlah += Order::where('id_properti', $id)
            ->where('status', 'accepted')
            ->count();
        return $jumlah;
    }
    public function hitungPesananSelesai($id){
        $jumlah = Order::where('id_properti', $id)
            ->where('status', 'accepted')
            ->count();
        $jumlah += Order::where('id_properti', $id)
            ->where('status', 'completed')
            ->count();
        return $jumlah;
    }

    public function about(){
        return view('about');
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function bookmark(){
        $bookmark = bookmark::where('id_user', Auth::id())->get();
        $property = property::all();
        return view('bookmark', ['bookmark'=>$bookmark, 'property'=>$property]);
    }

    public function addBookmark($id){
        $property = property::where('id_properti', $id);

        $bookmark = bookmark::where('id_properti', $id)->where('id_user', Auth::id())->first();
        if($bookmark != null){
            return redirect()->back()->with('msg', 'Sudah ada di bookmark!');
        }

        bookmark::create([
            'id_properti' => $id,
            'id_user' => Auth::id(),
        ]);

        return redirect()->back()->with('msgAdd', 'Berhasil ditambah ke Bookmark');
    }

    public function hapusBookmark($id){
        $bookmark = bookmark::where('id_properti', $id)->where('id_user', Auth::id())->first();

        $bookmark->delete();

        return redirect()->back()->with('msgHapus', 'Berhasil dihapus');
    }

    public function belajar(){
        return view('belajar');
    }

    public function get_data(){
        $data = [
            [
                'id' => rand(1, 5),
                'name' => md5(microtime())
                //....
            ],
            [
                'id' => rand(1, 5),
                'name' => md5(microtime())
                //....
            ],
        ];
        return response()->json($data);
    }
}
