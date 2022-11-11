@extends('base.main')
@section('title')
Burscape - Link To Opportunities
@endsection
@section('content')
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex">
        <img src="{{asset('images/icons/Burscapelogo(no-caption).png')}}"  >
        <h1 class="pt-1 ps-1"><a href="index.html"><span>Burscape</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="" id="loker">Lowongan Kerja</a></li>
          <li><a class="nav-link scrollto" href="" id="perusahaan">Perusahaan</a></li>
          <li><a class="nav-link scrollto " href="" id="loker">Lowongan Kerja</a></li>
          <li><a class="nav-link scrollto" href="" id="perusahaan">Perusahaan</a></li>
       </ul>
       <i class="bi bi-list  mobile-nav-toggle"></i>
        
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" >

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="px-4 py-2 my-2 text-center align-items-start">
          <div data-aos="zoom-out">
            <h2>Jelajahi Pekerjaan yang sesuai untukmu!</h2>
            <div class="d-flex justify-content-center ">
              
            <form action="/search" class="js-search-input-form search-input-form" method="get" style="width:50% ">
              
              <div class="input-group mb-3 ">
              <button class="btn btn-light" type="button" id="button-addon1" style="background-color:#ffffff ; border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          
            </div>
            </form>
            <form action="/search" class="js-search-input-form search-input-form" method="get" style="width:50%;">
              
              <div class="input-group mb-5 ms-4">
              <button class="btn btn-light" type="button" id="button-addon1" style="background-color:#ffffff ; border: none;"><i class="fa-solid fa-briefcase"></i></button>
              <input type="search" class="form-control" placeholder="Bidang" aria-label="Search" aria-describedby="search-addon" />
          
            </div>
            </form>
            <!-- <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div> -->
          </div>
        </div>

      </div>
    </div>
    <div class="svg-border-rounded text-white">
      <!-- Rounded SVG Border-->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
  </div>
  </section><!-- End Hero -->


 <!-- ======= What We Do Section ======= -->
 <section id="what-we-do" class="what-we-do">
  <div class="container px-5 py-5" id="featured-3">
    <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up" style="font-family: 'Poppins', sans-serif; color: black; font-weight: 900; font-size: 4rem;">LINK TO </h1>
    <h2 class="text-center bold" id="peluang" data-aos="fade-up">OPPORTUNITIES</h2>
    <h2 class="mt-5 mb-5" data-aos="fade-up" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 46px;text-align: center;">Cari Peluang Terbaik untuk Mencapai Karier Impianmu</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 text-center justify-content-center mt-5">
      <div class="col-lg-4 mt-5 " data-aos="zoom-in" data-aos-delay="100" id="feedback" style="
      border-radius: 8px;">
        <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Beri Masukan</h3>
   
        <img src="{{asset('images/icons/Online-Support.svg')}}" class="pb-3"  alt="">
        <p style="font-family: 'Poppins', sans-serif; font-size: 22px;  ">Bantu kami dengan mengirimkan kritik dan saran.</p>
      </div>
      <div class="col-lg-4 mt-5" data-aos="zoom-in" data-aos-delay="100" id="jobseeker" style="
      border-radius: 8px;">
        <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Cari Pekerjaan</h3>
        <img src="{{asset('images/icons/Job-Seeker.svg')}}" fill="currentColor" class="pb-3 " alt="">
      
        <p style="font-family: 'Poppins', sans-serif; font-size: 22px;   ">Cari Pekerjaan yang sesuai denganmu.</p>
      </div>
      <div class="col-lg-4 mt-5" data-aos="zoom-in" data-aos-delay="100" id="lamar" style="
      border-radius: 8px;">
        <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Lamar</h3>
        <img src="{{asset('images/icons/Handshake.svg')}}" class="pb-3" alt="">
        <p style="font-family: 'Poppins', sans-serif; font-size: 22px;">Lamar Pekerjaan Impianmu.</p>
      </div>
    </div>
  </div>
</section><!-- End What We Do Section -->



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-4 col-md-6">
           
              <img src="{{asset('images/icons/Burscapelogo(no-caption).png')}}" width="300px" heigth="300px" class="pe-3" >
            
           
          </div>
<!-- 
          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootsrap</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div> -->

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Lowongan Kerja</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perusahaan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Lowongan Kerja</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perusahaan</a></li>
            </ul>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 footer-links">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Bandung, Jawa Barat</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              burscape.company@gmail.com
            </p>
          </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Burscape</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
@endsection