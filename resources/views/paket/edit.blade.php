@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Paket</h1>
@stop

@section('content')
    <form action="{{route('pakets.update', $paket)}}" method="post" enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                            <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="exampleInputName" placeholder="Nama paket" name="id" value="{{$paket->id ?? old('id')}}">
                            @error('id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Paket</label>
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputName" placeholder="Nama paket" name="nama_paket" value="{{$paket->nama_paket ?? old('nama_paket')}}">
                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Masukkan Harga" name="harga" value="{{$paket->harga ?? old('harga')}}">
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputgambar"><img src="/image/{{$paket->gambar}}"  width="10%"></label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputgambar" placeholder="gambar" name="gambar">
                            @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                            <textarea class="form-control" id="exampleFormControlDetail" name="detail" rows="3">{{$paket->detail}}</textarea>
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
