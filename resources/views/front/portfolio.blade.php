<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Portfolio</h2>
      @foreach ($portfolio_titles as $title )
      <p>{{$title->title}}</p>
      @endforeach
    </div>

    <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="">All</li>
      @foreach ($categories as $category )
      <li data-filter="{{'.'.$category->name}}">{{$category->name}}</li>
      @endforeach
    </ul>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($products as $product )
        
      
      <div class="col-lg-4 col-md-6 portfolio-item {{$product->category->name}}">
        
        <div class="portfolio-img"><img src="{{asset('front/product.upload/'.$product->image)}}" class="img-fluid" alt=""></div>
        <div class="portfolio-info">
          <h4>{{$product->name}}</h4>
          <p>{{$product->description}}</p>
          <a href="{{asset('front/product.upload/'.$product->image)}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
        
      </div>
      @endforeach


    </div>

  </div>
</section>