<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pesan;
use App\Models\Menu;
use App\Models\Table;
use App\Enums\TableStatus;

class PembayaranController extends Controller
{
    public function index()
    {
        $pesans = pesan::with('menu')->get();
        $menus = Menu::all();
        $pesans =pembayaran::with('menu')->get();
        // $tables = Table::where('id',$table_id)->get();
        $total = 0;

        $sub_total = 0;

        foreach ($pesans as $pesan) {
            $sub_total += $pesan->menu->price * $pesan->quantity;
        }

        $total = $sub_total;

        return view('admin.pembayaran.index', [
            'pesans' => $pesans,
            'menus' => $menus,
            
            // 'tables' => $tables,
            'total' => $total,
            'sub_total' => $sub_total,
        ]);
        
    }
}
