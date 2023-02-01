<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Services</h2>
      @foreach ($service_title as $title)
      <p>{{$title->title}}</p>
      @endforeach
    </div>

    <div class="row">
      @foreach ($services as $service )
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="{{$service->icon}}"></i></div>
          <h4><a href="">{{$service->title}}</a></h4>
          <p>{{$service->description}}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>