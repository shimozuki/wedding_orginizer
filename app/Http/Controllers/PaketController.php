<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', [
            'paket' => $pakets
        ]);
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $array = $request->all();
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $array['gambar'] = "$profileImage";
        }
        $paket = Paket::create($array);
        return redirect()->route('pakets.index')
            ->with('success_message', 'Berhasil menambah paket baru');
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        if (!$paket) return redirect()->route('pakets.index')
            ->with('error_message', 'Paket dengan id '.$id.' tidak ditemukan');
            return view('paket.edit', [
                'paket' => $paket
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paket = Paket::find($id);
        $paket->nama_paket = $request->nama_paket;
        $paket->detail = $request->detail;
        $paket->harga = $request->harga;
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $paket['gambar'] = "$profileImage";
        }else{
            unset($paket['gambar']);
        }
        $paket->save();
        return redirect()->route('pakets.index')
            ->with('success_message', 'Berhasil mengubah paket');
    }

    public function destroy(Request $request, $id)
    {
        $paket = Paket::find($id);
        if ($paket) $paket->delete();
        return redirect()->route('pakets.index')
            ->with('success_message', 'Berhasil menghapus Paket');
    
    }
}
