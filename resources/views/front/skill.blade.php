<section id="skills" class="skills">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
        <img src="{{asset('front')}}/assets/img/skills.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
        @foreach ($skill_title as $title )
        <h3>{{$title->title}}</h3>
        <p class="fst-italic">
          {{$title->description}}
        </p>
        @endforeach
        <div class="skills-content">
          @foreach ($skills as $skill )
          <div class="progress">
            <span class="skill">{{$skill->name}} <i class="val">{{$skill->percent}}%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</section>