<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pesan;
use App\Models\Menu;
use App\Models\Table;
use App\Enums\TableStatus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PemmbayaranController extends Controller
{
    public function processPayment(Request $request)
    {
        $user=Auth::user();
        $user_id =$user->id;
        $pesans= Pesan::where('user_id','=', $user_id)->get();
        $menus = Menu::all();

        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        

        foreach($pesans as $pesan)
        {
            $name = $request->input('name');
        $paymentMethod = $request->input('payment_method');
        $paymentProof = $request->file('payment_proof');
        $total = $pesan->menu->price * $pesan->quantity;
        
        
    
            $pembayaran = new Pembayaran();
            $pembayaran->menu_id = $pesan->menu_id;
            $pembayaran->table_id=$pesan->table_id;
            $pembayaran->quantity = $pesan->quantity;
            $pembayaran->total = $pesan->total;
            $pembayaran->name = $name;
            $pembayaran->payment_method = $paymentMethod;
            $pembayaran->payment_proof = $paymentProof;
            $pembayaran->user_id = $user_id;
            $pembayaran->total = $total;
            $pembayaran->save();  
            
            $data =$pesan->id;
            $data = Pesan::find($data);
            $data->delete();
            
        }

        return view('welcome',compact('menus','tables'))->with('success', 'Pembayaran berhasil disubmit');
        
    //     $menus = menu::all();
    //     $user_id = Auth::id();

        

    // $pesans = Pesan::where('user_id', $user_id)->get();

    // $name = $request->input('name');
    // $paymentMethod = $request->input('payment_method');
    //     $paymentProof = $request->file('payment_proof');
    
    // $total = $pesans->sum(function ($pesan) {
    //     return $pesan->menu->price * $pesan->quantity;
    // });

    // $pembayaran = new Pembayaran();
    // $pembayaran->name = $name;
    // $pembayaran->payment_method = $paymentMethod;
    // $pembayaran->payment_proof = $paymentProof;
    // $pembayaran->user_id = $user_id;
    // $pembayaran->total = $total;
    // foreach ($pesans as $pesan) {
    //     $pembayaran->menu_id = $pesan->menu_id;
    //     $pembayaran->quantity = $pesan->quantity;
    //     // Simpan entri pembayaran per pesanan
    //     $pembayaran->save();    
        
    // }

    
        
    
        
    
    // Simpan bukti pembayaran, jika ada
    
    // Kembalikan respons atau lakukan apa yang diperlukan
    // return view('pembayaran.history',compact('menus'));
    // return view('pembayaran.history',compact('count'))->with('success', 'Pembayaran berhasil dilakukan!');
    }

    public function riwayat()
    {
        $user_id = Auth::id();
        $count = pesan::where('user_id', $user_id)->count();    
        if (Session::has('pesan')) {
            Session::forget('pesan');
            $count = 0;
        }
        Session::forget('pesan');
        return view('pembayaran.history',['count' =>$count])->with('success', 'Pembayaran berhasil dilakukan!');
    }
}

