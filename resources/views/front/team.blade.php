<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Team</h2>
      @foreach ($team_titles as $title )
      <p>{{$title->title}}</p>
      @endforeach
    </div>

    <div class="row">
      @foreach ($members as $member)
      <div class="col-lg-6">
        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
          <div class="pic"><img src="{{asset('front/team,upload/'.$member->image)}}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{$member->name}}</h4>
            <span>{{$member->job}}</span>
            <p>{{$member->description}}</p>
            <div class="social">
              @if ($member->twitter != null)
              <a href="{{$member->twitter}}"><i class="ri-twitter-fill"></i></a>
              @endif
              @if ($member->facebook != null)
              <a href="{{$member->facebook}}"><i class="ri-facebook-fill"></i></a>
              @endif
              @if ($member->instagram != null)
              <a href="{{$member->instagram}}"><i class="ri-instagram-fill"></i></a>
              @endif
              @if ($member->linkedin != null)
              <a href="{{$member->linkedin}}"><i class="ri-linkedin-box-fill"></i></a>
              @endif
              {{-- <a href="{{$member->facebook}}"><i class="ri-facebook-fill"></i></a>
              <a href="{{$member->instagram}}"><i class="ri-instagram-fill"></i></a>
              <a href="{{$member->linkedin}}"> <i class="ri-linkedin-box-fill"></i> </a> --}}
              
            </div>
          </div>
        </div>
      </div>
      @endforeach


    </div>

  </div>
</section>