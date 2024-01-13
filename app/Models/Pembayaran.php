<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'menu_name' , 'quantity' , 'total' , 
    'payment_method' , 'payment_proof' , 'status'
        // Daftar atribut lain yang ingin Anda masukkan di sini
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function table()
{
    return $this->belongsTo(Table::class, 'table_id');
}
}
