<section id="clients" class="clients section-bg">
  <div class="container">

    <div class="row" data-aos="zoom-in">
      @foreach ($clients as $client)
      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="{{asset('front/client.upload/'.$client->image)}}" class="img-fluid" alt="">
      </div>
      @endforeach

      

    </div>

  </div>
</section>