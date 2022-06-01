@include('sweetalert::alert')
@extends('layouts.index')
@extends('layouts.slider')
@section('konten')
<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Watches
        </h2>
      </div>
      <div class="row">
      @foreach($produk as $key => $produks)
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="{{route('welcome.show', $produks->id_paket)}}">
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
              @if(date("Y-m-d") >= $produks->end_date)  
              <div class="new">
                <span>
                  Diskon 0%
                </span>
              </div>
              @else
              <div class="new">
                <span>
                  Diskon {{$produks->diskon}}%
                </span>
              </div>
              @endif
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="{{ url('produk')}}">
          View All
        </a>
      </div>
    </div>
  </section>
  <!-- end shop section -->
  <!-- about section -->
<section class="about_section layout_padding" id="about">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
            <img src="../assets/image/{{$aboutes->image}}" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              {{$aboutes->about}}
            </p>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <!-- feature section -->

  <section class="feature_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Features Of Wedding Orginizer
        </h2>
        <p>
          Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/f1.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Ceremony
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/f2.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Perfect Cake
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/f3.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Photography
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/f4.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Guest List
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end feature section -->
  @endsection