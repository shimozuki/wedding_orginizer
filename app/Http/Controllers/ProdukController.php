<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Paket;
use App\Models\Transaksi;
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
    public function edit($id)
    {
        $produk = Paket::join("promos", function($join){
            $join->on("pakets.id", "=", "promos.id_paket");
        })->where('id_paket', $id)->first();

        return view('bahan.form', [
            'paket' => $produk
        ]);
    }

    public function show($id)
    {
        $produk = Paket::join("promos", function($join){
            $join->on("pakets.id", "=", "promos.id_paket");
        })->where('id_paket', $id)->first();

        return view('bahan.pesanan', [
            'paket' => $produk
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
            'tanggal_layanan' => 'required',
            'status_pemesanan' => 'required',
            'id_paket' => 'required',
            'total_harga' => 'required',
        ]);

        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->alamat = $request->alamat;
        $transaksi->no_tlpn = $request->no_tlpn;
        $transaksi->tanggal_layanan = $request->tanggal_layanan;
        $transaksi->status_pemesanan = $request->status_pemesanan;
        $transaksi->id_paket = $request->id_paket;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->save();
        return redirect()->route('welcome.index') ->with('message', 'Pesanan Berhasil, Silahkan Tunggu Konfirmasi Oleh Admin Melalu WA');
    }
}
