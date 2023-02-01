<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('front')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('front')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('front')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('front')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('front')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.9.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{url('/')}}">Arsha</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="{{asset('front')}}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{url('admin/dashboard')}}">Dashboard</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('front.hero')
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    @include('front.client')
    <!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    @include('front.about')
    <!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    @include('front.why_us')
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    @include('front.skill')
    <!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    @include('front.service')
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    @include('front.cta')
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('front.portfolio')
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    @include('front.team')
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    @include('front.pricing')
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('front.question')
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    @include('front.contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="{{route('news.store')}}" method="post">
              @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Arsha</h3>
            @foreach ($infos as $info )
            <p>
              {{$info->address}} <br>
              {{$info->city}} {{$info->post_code}}<br>
              {{$info->country}} <br><br>
              <strong>Phone:</strong> {{$info->phone}}<br>
              <strong>Email:</strong> {{$info->email}}<br>
            </p>
            @endforeach
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portfolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            @foreach ($socials as $social )
            <p>{{$social->description}}</p>
            <div class="social-links mt-3">
              <a href="{{$social->twitter}}" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{$social->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{$social->instagram}}" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{$social->skype}}" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="{{$social->linkedin}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('front')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('front')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('front')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('front')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('front')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('front')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('front')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('front')}}/assets/js/main.js"></script>

</body>

</html>