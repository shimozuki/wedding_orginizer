<?php

namespace App\Http\Controllers;

use App\Models\About;
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
}
