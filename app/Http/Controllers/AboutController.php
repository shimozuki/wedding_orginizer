<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('about.index', [
            'about' => $about
        ]);
    }


    public function edit($id)
    {
        $about = About::find($id);
        if (!$about) return redirect()->route('abouts.index')
        ->with('error_message', 'About dengan id '.$id.' tidak ditemukan');
        return view('about.edit', [
            'about' => $about
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'about' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email',
            'tiktok' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $about = About::find($id);
        $about->about = $request->about;
        $about->facebook = $request->facebook;
        $about->instagram = $request->instagram;
        $about->whatsapp = $request->whatsapp;
        $about->email = $request->email;
        $about->tiktok = $request->tiktok;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $about['image'] = "$profileImage";
        }else{
            unset($about['image']);
        }
        $about->save();
        return redirect()->route('abouts.index')
            ->with('success_message', 'Berhasil mengubah tendatang Website');

    }
    public function destroy(Request $request, $id)
    {
        $about = About::find($id);
        if ($about) $about->delete();
        return redirect()->route('abouts.index')
            ->with('success_message', 'Berhasil menghapus about');
    
    }
}
