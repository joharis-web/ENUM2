<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Menu;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function redirects()
    {
        

        $menus = menu::all();
        $is_admin = Auth::user()->is_admin;
        if ($is_admin=='1') 
        {
            return view('admin.index');
        }
        else
        {
            $user_id = Auth::id();
            
            $count = pesan::where('user_id', $user_id)->count();
            return view('welcome', compact('menus','count'));
        }
    }
}
