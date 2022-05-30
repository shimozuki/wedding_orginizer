<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'no_tlpn',
        'tanggal_layanan',
        'status_pemesanan',
        'id_paket',
        'total_harga',
        'created_at',
    ];
}
