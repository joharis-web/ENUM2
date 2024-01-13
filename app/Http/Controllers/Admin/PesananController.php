<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Pembayaran;
use App\Models\Menu;
use App\Models\Table;
use App\Enums\TableStatus;
class PesananController extends Controller
{
    public $pesans, $sub_total = 0, $total=0;
    public function index()
    {
        $pesans = pesan::with('menu')->get();
        $menus = Menu::all();
        // $tables = Table::where('id',$table_id)->get();
        $total = 0;

        $sub_total = 0;

        foreach ($pesans as $pesan) {
            $sub_total += $pesan->menu->price * $pesan->quantity;
        }

        $total = $sub_total;

        return view('admin.pesanan.index', [
            'pesans' => $pesans,
            'menus' => $menus,
            // 'tables' => $tables,
            'total' => $total,
            'sub_total' => $sub_total,
        ]);
    }

    public function create()
    {
        $pesans = pesan::with('menu')->get();
        $menus = Menu::all();
        // $tables = Table::where('id',$table_id)->get();
        $total = 0;

        $sub_total = 0;

        foreach ($pesans as $pesan) {
            $sub_total += $pesan->menu->price * $pesan->quantity;
        }

        $total = $sub_total;
        return view('admin.pesanan.index',compact('pesans','menus'));
    }

    public function edit(Pesan $pesan)
    {
        
        return view('admin.pesanan.edit',compact('pesan'));
    }

    public function update(Request $request, Pesan $pesan)
    {
        $request->validate([
            'user_id' => 'required',
            'menu_id' => 'required',
            'table_id' => 'required',
            'quantity' => 'required'
        ]);
        

        $pesan->update([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'table_id' => $request->table_id,
            'quantity' => $request->quantity
        ]);

        
        return to_route('admin.pesanan.index')->with('success', 'Pesanan updated successfully.');
    }
}
