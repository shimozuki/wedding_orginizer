@extends('layouts.header')
@section('pesanan')
<!-- about section -->
<section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
          <img src="../image/{{$paket->gambar}}" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                {{$paket->nama_paket}}
              </h2>
            </div>
            <p>
              {{$paket->detail}}
            </p>
            <p>
                <b>Harga : Rp. {{$paket->harga}}</b>
            </p>
            <p>
                <b>Diskon : 0% <i class="fa fa-tag" aria-hidden="true"></i></b> 
            </p>
            <a href="{{route('nonpromo.edit', $paket->id)}}" class="btn btn-primary btn-xs">
              Pesan
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('welcome.store')}}" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputNama_paket" placeholder="Nama" name="nama" value="{{old('nama')}}">
                            @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nomor WhatsApp</label>
                            <input type="text" class="form-control @error('no_tlpn') is-invalid @enderror" id="exampleInputno_tlpn" placeholder="Nomor WhatsApp" name="no_tlpn" value="{{old('no_tlpn')}}">
                            @error('no_tlpn') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputalamat" placeholder="Nama Paket" name="alamat" value="{{old('alamat')}}">
                            @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Acara</label>
                            <input type="date" class="form-control @error('tanggal_layanan') is-invalid @enderror" id="exampleInputtanggal_layanan" placeholder="Nama Paket" name="tanggal_layanan" value="{{old('tanggal_layanan')}}">
                            @error('tanggal_layanan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Paket</label>
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputNama_paket" placeholder="Nama Paket" name="nama_paket" value="{{$paket->nama_paket}}" readonly>
                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                            <textarea class="form-control" id="exampleFormControlDetail" name="detail" rows="3" readonly>{{$paket->detail}}</textarea>
                        </div>
                        <div class="form-group">
                           <p>
                             <b>Harga :</b> Rp. {{$paket->harga}}
                             <br>
                            <b>Potongan : </b> Rp. {{($paket->diskon/100) * $paket->harga}}
                            <br>
                            <b>Total Pembayaran : </b>Rp. {{$paket->harga - (($paket->diskon/100) * $paket->harga)}}
                           </p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control @error('total_harga') is-invalid @enderror" id="exampleInputTotal_harga" placeholder="Masukkan harga" name="total_harga" value="{{$paket->harga - (($paket->diskon/100) * $paket->harga)}}" readonly>
                            @error('total_harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>
  <!-- end about section -->
  @endsection