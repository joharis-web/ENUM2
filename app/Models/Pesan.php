<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Table;

class Pesan extends Model
{
    use HasFactory;

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
