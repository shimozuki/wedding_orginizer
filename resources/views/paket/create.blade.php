@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Paket</h1>
@stop

@section('content')
    <form action="{{route('pakets.store')}}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama Paket</label>
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputNama_paket" placeholder="Nama Paket" name="nama_paket" value="{{old('nama_paket')}}">
                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputHarga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputharga" placeholder="Masukkan harga" name="harga" value="{{old('harga')}}">
                            @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGambar">gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputgambar" placeholder="gambar" name="gambar">
                            @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                            <textarea class="form-control" id="exampleFormControlDetail" name="detail" rows="3"></textarea>
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
