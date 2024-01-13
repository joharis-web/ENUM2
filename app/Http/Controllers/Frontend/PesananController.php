<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan;
use App\Models\Table;
use App\Models\Menu;


use Illuminate\Http\Request;

class PesananController extends Controller
{
    public $pesans, $sub_total = 0, $total=0;
    // menampilkan semua data yang ada di keranjang
    public function show()
    {
        $user_id = auth()->user()->id;
        $pesans = pesan::with('menu')->where('user_id','=' ,$user_id)->get();
        $menus = Menu::all();
        $this->total = 0;
        $this->sub_total = 0;

        foreach($pesans as $pesan){
            $this->sub_total += $pesan->menu->price * $pesan->quantity;
        }

        $this->total = $this->sub_total;

        return view ('pesanan.index',[
            
            'pesans' =>$pesans,
            'menus' => $menus,
            'total' => $this->total,
            'sub_total'=>$this->sub_total,
        ]);

        
    }

    public function updateQuantity($id, $newQuantity)
{
    $pesan = Pesan::findOrFail($id);
    $pesan->quantity = $newQuantity;
    $pesan->save();

    

    return response()->json(['message' => 'Quantity updated successfully']);
}

public function getTotals()
{
    $user_id = auth()->user()->id;

    $pesans = Pesan::where('user_id', $user_id)->get();

    $subTotal = 0;
    foreach ($pesans as $pesan) {
        $subTotal += $pesan->menu->price * $pesan->quantity;
    }

    return response()->json([
        'total' => $subTotal, // Anda mungkin memiliki perhitungan total yang lebih rumit di sini
        'subTotal' => $subTotal,
    ])->with('success', 'Menu Sudah terupdate');
}

public function pembayaran()
    {
        $user_id = auth()->user()->id;
        $pesans = pesan::with('menu')->where('user_id' ,$user_id)->get();
        $menus = Menu::all();
        $this->total = 0;
        $this->sub_total = 0;

        foreach($pesans as $pesan){
            $this->sub_total += $pesan->menu->price * $pesan->quantity;
        }

        $this->total = $this->sub_total;

        return view ('pembayaran.index',[
            
            'pesans' =>$pesans,
            'menus' => $menus,
            'total' => $this->total,
            'sub_total'=>$this->sub_total,
        ]);
        
    }


    // public function increment(Request $request)
    // {
    //     // $id = $request->input('id');
    //     $quantity = $request->input('quantity');
    //     $newQuantity = $quantity + 1;

    //     return response()->json([ 'newQuantity' => $newQuantity]);
    // }

    // public function decrement(Request $request)
    // {
    //     // $id = $request->input('id');
    //     $quantity = $request->input('quantity');
    //     $newQuantity = ($quantity > 1) ? $quantity - 1 : $quantity;

    //     return response()->json([ 'newQuantity' => $newQuantity]);
    // }

    // public function increment($id)
    // {
    //     $pesans = pesan::whereId($id)->first();
    //     $pesans->quantity += 1;
    //     $pesans->save();

    //     session()->flash('success', 'Product quantity updated !!!');
    // }

    // public function decrement($id)
    // {
    //         $pesans = pesan::whereId($id)->first();
    //     if($pesans->quantity > 1){
    //         $pesans->quantity -= 1;
    //         $pesans->save();
    //         session()->flash('success', 'Product quantity updated !!!');
    //     }else{
    //         session()->flash('info','You cannot have less than 1 quantity');
    //     }
    // }    

    // public function incrementQty($id){
    //     $pesans = pesan::whereId($id)->first();
    //     $pesans->quantity += 1;
    //     $pesans->save();

    //     session()->flash('success', 'Product quantity updated !!!');
    // }
    // public function decrementQty($id){
    //     $pesans = pesan::whereId($id)->first();
    //     if($pesans->quantity > 1){
    //         $pesans->quantity -= 1;
    //         $pesans->save();
    //         session()->flash('success', 'Product quantity updated !!!');
    //     }else{
    //         session()->flash('info','You cannot have less than 1 quantity');
    //     }
    // }

    // public function increment(Request $request)
    // {
    //     $quantity = $request->input('quantity');
    //     $newQuantity = $quantity + 1;

    //     return response()->json(['newQuantity' => $newQuantity]);
    // }

    // public function decrement(Request $request)
    // {
    //     $quantity = $request->input('quantity');
    //     $newQuantity = ($quantity > 1) ? $quantity - 1 : $quantity;

    //     return response()->json(['newQuantity' => $newQuantity]);
    // }
}


// untuk yang standart yang eror
// $pesans = Pesan::all();
//         $menus = Menu::all();
//         $this->pesans = pesan::with('menu')
//                 ->where(['user_id'=>auth()->user()->id])
//                 ->get();
//         $this->total = 0;
//         $this->sub_total = 0;

//         foreach($this->pesans as $pesan){
//             $this->sub_total += $pesan->menu->price * $pesan->quantity;
//         }

//         $this->total = $this->sub_total;

//         return view ('pesanan.index',[
//             // 'id' => auth()->user()->id,
//             'pesans' =>$pesans,
//             'menus' => $menus,
//             'total' => $this->total,
//             'sub_total'=>$this->sub_total,
//         ]);