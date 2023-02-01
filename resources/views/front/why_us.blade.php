<section id="why-us" class="why-us section-bg">
  <div class="container-fluid" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

        <div class="content">
          @foreach($why_title as $title )
          <h3>{{$title->title}}</h3>
          <p>
            {{$title->description}}
          </p>
          @endforeach
        </div>

        <div class="accordion-list">
          <ul>
            @foreach ($whies as $why )
            <li>
              <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-{{$why->id}}"><span>0{{$why->id}}</span> {{$why->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-{{$why->id}}" class="collapse show" data-bs-parent=".accordion-list">
                <p>
                  {{$why->answer}}
                </p>
              </div>
            </li>
            @endforeach
          </ul>
        </div>

      </div>

      <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{asset('front')}}/assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
    </div>

  </div>
</section>