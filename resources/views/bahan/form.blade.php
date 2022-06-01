@extends('layouts.header')
@section('form')
<section class="contact_section layout_padding" style="padding-left: 30%;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Form Pemesanan
              </h2>
            </div>
            <form action="{{route('welcome.store')}}" method="post">
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
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputalamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                            @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Acara</label>
                            <input type="date" class="form-control @error('tanggal_layanan') is-invalid @enderror" id="exampleInputtanggal_layanan" placeholder="Alamat" name="tanggal_layanan" value="{{old('tanggal_layanan')}}">
                            @error('tanggal_layanan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Paket</label>
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="exampleInputNama_paket" placeholder="Nama Paket" name="nama_paket" value="{{$paket->nama_paket}}" readonly>
                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control @error('id_paket') is-invalid @enderror" id="exampleInputid_paket" placeholder="Nama Paket" name="id_paket" value="{{$paket->id_paket}}" readonly>
                            @error('id_paket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control @error('status_pemesanan') is-invalid @enderror" id="exampleInputstatus_pemesanan" placeholder="Nama Paket" name="status_pemesanan" value="1" readonly>
                            @error('status_pemesanan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                        @if(date("Y-m-d") >= $paket->end_date)
                        <p>
                             <b>Harga :</b> Rp. {{$paket->harga}}
                             <br>
                            <b>Potongan : </b> Rp. 0
                            <br>
                            <b>Total Pembayaran : </b>Rp. {{$paket->harga}}
                           </p>  
                        @else
                           <p>
                             <b>Harga :</b> Rp. {{$paket->harga}}
                             <br>
                            <b>Potongan : </b> Rp. {{($paket->diskon/100) * $paket->harga}}
                            <br>
                            <b>Total Pembayaran : </b>Rp. {{$paket->harga - (($paket->diskon/100) * $paket->harga)}}
                           </p>
                           @endif
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control @error('total_harga') is-invalid @enderror" id="exampleInputTotal_harga" placeholder="Masukkan harga" name="total_harga" value="{{$paket->harga - (($paket->diskon/100) * $paket->harga)}}" readonly>
                            @error('total_harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('welcome.index')}}" class="btn btn-default">
                            <button type="submit" class="btn btn-danger">Batal</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection