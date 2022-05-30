@section('slider')
 <!-- slider section -->
 <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
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
                    <img src="{{ asset('assets/images/banner2-.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
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
                    <img src="{{ asset('assets/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
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
                    <img src="{{ asset('assets/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
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