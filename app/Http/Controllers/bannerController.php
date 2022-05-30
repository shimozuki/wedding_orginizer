<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    public function index()
    {
        $baner = Banner::all();
        return view('banner.index', [
            'banner' => $baner
        ]);
    }

    public function create()
    {
        return view('banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2097152',
        ]);
        $data = new Banner();
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        if ($image = $request->file('gambar')) {
            $destinationPath = 'assets/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['gambar'] = "$profileImage";
        }
        $data->save();
        return redirect()->route('banners.index')
                ->with('success_message', 'Berhasil menambah About baru');
    }
    public function edit($id)
    {
        $banner = Banner::find($id);
        if (!$banner) return redirect()->route('banners.index')
        ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        return view('banner.edit', [
            'banner' => $banner
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2097152',
        ]);
        $data = Banner::find($id);;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        if ($image = $request->file('gambar')) {
            $destinationPath = 'assets/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['gambar'] = "$profileImage";
        }else{
            unset($data['gambar']);
        }
        $data->save();
        return redirect()->route('banners.index')
            ->with('success_message', 'Berhasil mengubah Website');
    }
    public function destroy(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($banner) $banner->delete();
        return redirect()->route('banners.index')
            ->with('success_message', 'Berhasil menghapus Banner website');
    
    }
    

}
