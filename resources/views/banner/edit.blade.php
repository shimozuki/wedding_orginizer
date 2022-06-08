@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Banner</h1>
@stop

@section('content')
    <form action="{{route('banners.update', $banner)}}" method="post" enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                            <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="exampleInputName" placeholder="Nama paket" name="id" value="{{$banner->id ?? old('id')}}">
                            @error('id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputjudul" placeholder="judul" name="judul" value="{{$banner->judul ?? old('judul')}}">
                            @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControldeskripsi" name="deskripsi" rows="3">{{$banner->deskripsi}}</textarea>
                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                        <label for="exampleInputimage"><img src="/assets/image/{{$banner->gambar}}"  width="10%"></label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputgambar" placeholder="gambar" name="gambar">
                            @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
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
