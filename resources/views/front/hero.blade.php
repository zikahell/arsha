<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        @foreach ($head_titles as $title )
        <h1>{{$title->title}}</h1>
        <h2>{{$title->description}}</h2>
        @endforeach
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#services" class="btn-get-started scrollto">Get Started</a>
          <a href="https://www.youtube.com/watch?v=QyhwSYhX09s" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{asset('front')}}/assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section>