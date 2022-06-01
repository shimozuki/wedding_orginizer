<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_promo',
        'startdate',
        'end_date',
        'diskon',
        'status',
        'min_belanja',
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class);
    }
}
