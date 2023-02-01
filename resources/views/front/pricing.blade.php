<section id="pricing" class="pricing">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Pricing</h2>
      @foreach ($pricing_titles as $title )
      <p>{{$title->title}}</p>
      @endforeach
    </div>

    <div class="row">

      
      @foreach ($plans as $plan)
      <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
        <div class="box featured">
          <h3>{{$plan->name}}</h3>
          <h4><sup>$</sup>{{$plan->price}}<span>{{$plan->duration}}</span></h4>
          <ul>
          @foreach ($advantages as $advantage)
          @if($advantage->plan_id == $plan->id)
            <li><i class="bx bx-check"></i> {{$advantage->advantage}}</li>
          @endif
          @endforeach
          </ul>
          <a href="#" class="buy-btn">Get Started</a>
        </div>
      </div>
      @endforeach
      

      

    </div>

  </div>
</section>