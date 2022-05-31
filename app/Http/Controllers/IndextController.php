<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndextController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('layouts.index', [
            'aboutes' => $about
        ]);
    }
    public function show()
    {
        $banner = Banner::all();
        return view('layouts.slider', [
            'banner' => $banner
        ]);
    }

    public function tampil()
    {
       
    }
   
}
