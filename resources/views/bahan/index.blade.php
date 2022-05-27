@extends('layouts.index')
@extends('layouts.slider')
@section('konten')
<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Paket Promo
        </h2>
      </div>
      <div class="row">
      @foreach($paket_promo as $key => $pakets)
        <div class="col-md-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="image/{{$pakets->gambar}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                 {{$pakets->nama_paket}}
                </h6>
                <h6>
                  <span>
                    Rp.{{$pakets->harga}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  Featured
                </span>
              </div>
            </a>
          </div>
        </div>
        @endforeach
        
      </div>
      <br />
      <div class="heading_container heading_center" style="padding-top: 90px;">
        <h2>
          Paket Non Promo
        </h2>
      </div>
      <div class="row">
      @foreach($produk as $key => $produks)
        <div class="col-md-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="image/{{$produks->gambar}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                 {{$produks->nama_paket}}
                </h6>
                <h6>
                  <span>
                    Rp.{{$produks->harga}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  Paket
                </span>
              </div>
            </a>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>
  <!-- end shop section -->
  @endsection