@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Paket</h1>
@stop

@section('content')
    <form action="{{route('promo.update', $promo)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Kode Promo</label>
                            <input type="text" class="form-control @error('kode_promo') is-invalid @enderror" id="exampleInputName" placeholder="Nama paket" name="kode_promo" value="{{$promo->kode_promo ?? old('kode_promo')}}">
                            @error('kode_promo') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('startdate') is-invalid @enderror" id="exampleInputstartdate" placeholder="Masukkan startdate" name="startdate" value="{{$promo->startdate ?? old('startdate')}}">
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputend_date">Tanggal Berakhir</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="exampleInputend_date" placeholder="end_date" name="end_date" value="{{$promo->end_date}}">
                            @error('end_date') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputend_date">Diskon</label>
                            <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="exampleInputdiskon" placeholder="diskon" name="diskon" value="{{$promo->diskon}}">
                            @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputend_date">Minimal Belanja</label>
                            <input type="number" class="form-control @error('min_belanja') is-invalid @enderror" id="exampleInputmin_belanja" placeholder="min_belanja" name="min_belanja" value="{{$promo->min_belanja}}">
                            @error('min_belanja') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Paket</label>
                            <select class="form-control select2" name="id_paket" style="width: 100%;">
                            <option value="{{$promo->id_paket}}" selected="selected">--- Pilih Paket ---</option>
                            @foreach ($paket as $pakets)
                            <option value="{{$pakets->id}}" {{ old('id_paket') == $pakets->id ? 'selected' : null}}>{{$pakets->nama_paket}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('users.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
