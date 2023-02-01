<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>Call To Action</h3>
        @foreach ($cta_titles as $title )
        <p> {{$title->title}}</p>
        @endforeach
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="#contact">Call To Action</a>
      </div>
    </div>

  </div>
</section>