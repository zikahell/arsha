<section id="contact" class="contact">
  @include('sweetalert::alert')
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">

      <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            @foreach ($infos as $info )
            <p>{{$info->address}}, {{$info->city}} {{$info->post_code}}</p>
            @endforeach
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            @foreach ($infos as $info )
            <h4>Email:</h4>
            <p>{{$info->email}}</p>
            @endforeach
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            @foreach ($infos as $info )
            <p>{{$info->phone}}</p>
            @endforeach
          </div>

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
        </div>

      </div>

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="{{route('messages.store')}}" method="post"  class="php-email-form" novalidate>
          @csrf
          <div class="col-auto">
            @if(session('success')!= null)
                <div class="alert alert-success">{{session('success')}}</div>
              @endif
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group">
            <label for="content">Message</label>
            <textarea class="form-control" name="content" rows="10" required></textarea>
          </div>
          
          <div>
            <input type="submit" class="form-control" value="Send Message">
          </div>
          </form>
      </div>

    </div>

  </div>
</section>