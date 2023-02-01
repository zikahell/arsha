<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About Us</h2>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          {{$content->title}}
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> {{$content->line1}}</li>
          <li><i class="ri-check-double-line"></i> {{$content->line2}}</li>
          <li><i class="ri-check-double-line"></i> {{$content->line3}}</li>
        </ul>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          {{$content->description}}
        </p>
        <a href="#about" class="btn-learn-more">Learn More</a>
      </div>
    </div>

  </div>
</section>