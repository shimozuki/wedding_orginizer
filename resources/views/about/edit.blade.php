@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Tentang</h1>
@stop

@section('content')
    <form action="{{route('abouts.update', $about)}}" method="post" enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                            <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="exampleInputName" placeholder="Nama paket" name="id" value="{{$about->id ?? old('id')}}">
                            @error('id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Faceobook</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputfacebook" placeholder="Nama Paket" name="facebook" value="{{$about->facebook ?? old('facebook')}}">
                            @error('facebook') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName">Instagram</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="exampleInputinstagram" placeholder="Nama Paket" name="instagram" value="{{$about->instagram ?? old('instagram')}}">
                            @error('instagram') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Whatsapp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="exampleInputwhatsapp" placeholder="Nama Paket" name="whatsapp" value="{{$about->whatsapp ?? old('whatsapp')}}">
                            @error('whatsapp') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Nama Paket" name="email" value="{{$about->email ?? old('email')}}">
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tiktok</label>
                            <input type="text" class="form-control @error('tiktok') is-invalid @enderror" id="exampleInputtiktok" placeholder="Nama Paket" name="tiktok" value="{{$about->tiktok ?? old('tiktok')}}">
                            @error('tiktok') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" id="exampleInputwebsite" placeholder="Nama Paket" name="website" value="{{$about->website ?? old('website')}}">
                            @error('website') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputimage"><img src="/assets/image/{{$about->image}}"  width="10%"></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInputimage" placeholder="image" name="image">
                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">About</label>
                            <textarea class="form-control" id="exampleFormControlAbout" name="about" rows="3">{{$about->about}}</textarea>
                            @error('about') <span class="text-danger">{{$message}}</span> @enderror
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
