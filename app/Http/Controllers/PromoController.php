<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PromoController extends Controller
{
    public function index()
    {
        $promo = Promo::select('promos.*', 'pakets.id as paket_code', 'pakets.nama_paket')
                ->join("pakets", function($join){
                $join->on("promos.id_paket", "=", "pakets.id");
        })->get();
        return view('promo.index', [
            'promo' => $promo
        ]);
    }

    public function create()
    {
        $paket = Paket::all();
        return view('promo.create', compact('paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_promo' => 'required',
            'startdate' => 'required',
            'end_date' => 'required',
            'diskon' => 'required',
            'min_belanja' => 'required',
            'id_paket' => 'required',
        ]);
        $promo = new Promo;
        $promo->kode_promo = $request->kode_promo;
        $promo->startdate = $request->startdate;
        $promo->end_date = $request->end_date;
        $promo->diskon = $request->diskon;
        $promo->min_belanja = $request->min_belanja;
        $promo->id_paket = $request->id_paket;
        $promo->save();
        return redirect()->route('promo.index')
                ->with('success_message', 'Berhasil menambah paket baru');
    }

    public function edit($id)
    {
        $promo = Promo::find($id);
        $paket = Paket::all();
        if (!$promo) return redirect()->route('promo.index')
            ->with('error_message', 'Promo dengan id '.$id.' tidak ditemukan');
            return view('promo.edit', [
                'promo' => $promo,
                'paket' => $paket
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_promo' => 'required',
            'startdate' => 'required',
            'end_date' => 'required',
            'diskon' => 'required',
            'min_belanja' => 'required',
        ]);
        $promo = Promo::find($id);
        $promo->kode_promo = $request->kode_promo;
        $promo->startdate = $request->startdate;
        $promo->end_date = $request->end_date;
        $promo->diskon = $request->diskon;
        $promo->min_belanja = $request->min_belanja;
        $promo->id_paket = $request->id_paket;
        $promo->save();
        return redirect()->route('promo.index')
        ->with('success_message', 'Berhasil mengubah promo');
    }

    public function destroy(Request $request, $id)
    {
        $promo = Promo::find($id);
        if ($promo) $promo->delete(); 
        return redirect()->route('promo.index')
            ->with('success_message', 'Berhasil menghapus promo');
    }
}
