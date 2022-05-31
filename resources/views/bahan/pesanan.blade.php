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
                <b>Diskon : {{$paket->diskon}}% <i class="fa fa-tag" aria-hidden="true"></i></b> 
            </p>
            <a href="{{route('welcome.edit', $paket->id_paket)}}" class="btn btn-primary btn-xs">
              Pesan
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  @endsection