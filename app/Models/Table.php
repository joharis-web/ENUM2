<?php

namespace App\Models;
use App\Enums\TableLocation;
use App\Enums\TableStatus;
use App\Models\Pesan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guest_number', 'status', 'location'];

    protected $casts = [
        'status' => TableStatus::class,
        'location' => TableLocation::class
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function pesan()
    {
        return $this->hasMany(pesan::class);
    }

    public function user()
    {
        return $this->hasMany(user::class);
    }

}
