<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Paket;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Promo::join("pakets", function($join){
            $join->on("promos.id_paket", "=", "pakets.id");
        })->get();

        return view('welcome', [
            'produk' => $produk
        ]);
    }

    public function produk()
    {
        $produk = Promo::join("pakets", function($join){
            $join->on("promos.id_paket", "=", "pakets.id");
        })->get();
        
        $id = Promo::select('id_paket')->pluck('id_paket');

        $produkt = Paket::select('*')->whereNotIn('id', $id)->get();
        return view('bahan.index', [
            'paket_promo' => $produk,
            'produk' => $produkt

        ]);
    }
}
