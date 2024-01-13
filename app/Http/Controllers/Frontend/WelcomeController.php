<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Pesan;
use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\PendingHasThroughRelationship;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        
        return view('welcome', compact('menus','tables'));
    }

    public function redirects()
    {
        if (Auth::check())
        {
            $tables = Table::where('status', TableStatus::Avalaiable)->get();
            $menus = menu::all();
            $user = Auth::user();
            if ($user->is_admin=='1') 
            {
            return view('admin.index');
            }else
            {

                $tables = Table::where('status', TableStatus::Avalaiable)->get();
            
            
                $user_id = $user->id;
                $count = pesan::where('user_id', $user_id)->count();
                return view('welcome', compact('menus','count','tables'));
            }
        }else{
            return redirect()->route('login');
        }
        
        
    }
    public function thankyou()
    {

        return view('thankyou');
    }

    public function addcart(Request $request,$id)
    {
        if (Auth::id()) {
            $tables = Table::where('status', TableStatus::Avalaiable);
            $user_id = Auth::id();
            $menuid = $id;
            $tableid=$request ->table_id;
            $quantity = $request->quantity;

            $pesanan = new pesan;
            $pesanan->user_id = $user_id;
            $pesanan->menu_id = $menuid;
            $pesanan->table_id= $tableid;
            $pesanan->quantity = $quantity;
            
            $pesanan->save();

            // $this->emit('updateCartCount');


            return redirect()->back()->with('success', 'Menu Sudah Ditambahkan Ke Keranjang.');
        } else {
            return redirect('/login');
        }
    }

    public function remove_cart($id)
    {
        $pesanan=pesan::find($id);
        $pesanan->delete();

        return redirect()->back()->with('Succes' ,'Menu Sudah di Hapus');
    }


}
