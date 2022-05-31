<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\Status;
use App\Models\About;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class Nonpromocontroller extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
                        ->join('statuses', 'transaksis.status_pemesanan', '=', 'statuses.id')
                        ->get(['pakets.nama_paket', 'statuses.keterangan', 'statuses.warna', 'transaksis.*']);
        $about = About::all();
        return view('transaksi.index', [
            'transaksi' => $transaksi,
            'aboutes' => $about
        ]);

    }
    public function show($id)
    {
        $paket = Paket::find($id);
        $about = About::first();
        return view('bahan.nonpromo', [
            'paket' => $paket,
            'aboutes' => $about
        ]);
    }

    public function edit($id)
    {
        $produk = Paket::find($id);
        $about = About::first();
        return view('bahan.pemesanan', [
            'paket' => $produk,
            'aboutes' => $about
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
        return redirect()->route('welcome.index')
            ->with('message', 'Pesanan Berhasil, Silahkan Tunggu Konfirmasi Oleh Admin Melalu WA');
    }

    public function tampil($id)
    {
        $transaksi = Transaksi::join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
                        ->join('statuses', 'transaksis.status_pemesanan', '=', 'statuses.id')
                        ->get(['pakets.nama_paket', 'pakets.detail', 'statuses.keterangan', 'transaksis.*'])->find($id);
        $status = Status::select('*')->where('id','!=', 1)->get();
        $about = About::first();
        return view('transaksi.form', [
            'transaksi' => $transaksi,
            'status' => $status,
            'aboutes' => $about

        ]);
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);
        Transaksi::where('id', $request->id)->update(array('status_pemesanan' => $request->status));
        return redirect()->route('nonpromo.index')
            ->with('success_message', 'Setatus Pesanan Berhasil Diubah');
    }
}
