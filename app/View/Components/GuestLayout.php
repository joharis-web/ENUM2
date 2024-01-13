<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;


class GuestLayout extends Component
{

    
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $user_id = Auth::id();
        $count = pesan::where('user_id', $user_id)->count();    
        if (Session::has('pesan')) {
            Session::forget('pesan');
            $count = 0;
        }

        return view('layouts.guest',['count'=>$count]);
    }

    
    
}
