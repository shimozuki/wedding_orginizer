@extends('adminlte::page')

@section('title', 'Edit Status')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Paket</h1>
@stop

@section('content')
    <form action="{{route('nonpromo.update', $transaksi)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                        <input type="hidden" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputnama_paket" placeholder="nama_paket" name="id" value="{{$transaksi->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Paket</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                            <option>--- Status ---</option>
                            @foreach ($status as $value)
                            <option value="{{$value->id}}" {{ old('id') == $value->id ? 'selected' : null}}>{{$value->keterangan}}</option>
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
