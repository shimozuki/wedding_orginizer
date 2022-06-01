@section('slider')
 <!-- slider section -->

 <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach($banner as $key => $banners) 
          <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <div class="container-fluid "> 
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                     {{ $banners->judul }}
                    </h1>
                    <p>
                      {{ $banners->deskripsi}}
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="../assets/image/{{$banners->gambar}}" alt="">
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
@endsection