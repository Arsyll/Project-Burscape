<x-app-layout layout="horizontal" :assets="$assets ?? []">
@extends('base.main')
@section('title')
Burscape - Link To Opportunities
@endsection
@section('content')

   <!-- ======= Hero Section ======= -->
   <section id="hero">

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="px-4 py-2 my-2 text-center align-items-start">
          <div data-aos="zoom-out">
            <h2>Jelajahi Pekerjaan yang sesuai untukmu!</h2>
            <div class="d-flex justify-content-center ">

              <form action="/search" class="js-search-input-form search-input-form" method="get" style="width:50% ">

                <div class="input-group mb-3 ">
                  <button class="btn btn-light" type="button" id="button-addon1"
                    style="background-color:#ffffff ; border: none;"><i
                      class="fa-solid fa-magnifying-glass"></i></button>
                  <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />

                </div>
              </form>
              <form action="/search" class="js-search-input-form search-input-form" method="get" style="width:50%;">

                <div class="input-group mb-5 ms-4">
                  <button class="btn btn-light" type="button" id="button-addon1"
                    style="background-color:#ffffff ; border: none;"><i class="fa-solid fa-briefcase"></i></button>
                  <input type="search" class="form-control" placeholder="Bidang" aria-label="Search"
                    aria-describedby="search-addon" />

                    <button class="btn btn-primary ms-2" type="button">Search</button>
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
          fill="currentColor">
          <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
        </svg>
      </div>
  </section><!-- End Hero -->


  <!-- ======= help Section ======= -->
  <section id="help" class="help">
    <div class="container px-5 py-5" id="featured-3">
      <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up"
        style="font-family: 'Poppins', sans-serif; color: black; font-weight: 900; font-size: 4rem;">LINK TO </h1>
      <h2 class="text-center bold" id="peluang" data-aos="fade-up">OPPORTUNITIES</h2>
      <h2 class="mt-5 mb-5" data-aos="fade-up"
        style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 46px;text-align: center;">Cari Peluang
        Terbaik untuk Mencapai Karier Impianmu</h2>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 text-center justify-content-center mt-5">
        <div class="col-lg-4 mt-5 " data-aos="zoom-in" data-aos-delay="100" id="feedback" style="
      border-radius: 8px;">
          <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Beri
            Masukan</h3>

          <img src="{{asset('images/icons/Online-Support.svg')}}" class="pb-3" alt="">
          <p style="font-family: 'Poppins', sans-serif; font-size: 22px;  ">Bantu kami dengan mengirimkan kritik dan
            saran.</p>
        </div>
        <div class="col-lg-4 mt-5" data-aos="zoom-in" data-aos-delay="100" id="jobseeker" style="
      border-radius: 8px;">
          <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Cari
            Pekerjaan</h3>
          <img src="{{asset('images/icons/Job-Seeker.svg')}}" fill="currentColor" class="pb-3 " alt="">

          <p style="font-family: 'Poppins', sans-serif; font-size: 22px;   ">Cari Pekerjaan yang sesuai denganmu.</p>
        </div>
        <div class="col-lg-4 mt-5" data-aos="zoom-in" data-aos-delay="100" id="lamar" style="
      border-radius: 8px;">
          <h3 class="fs-2 pb-3" style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 36px;">Lamar
          </h3>
          <img src="{{asset('images/icons/Handshake.svg')}}" class="pb-3" alt="">
          <p style="font-family: 'Poppins', sans-serif; font-size: 22px;">Lamar Pekerjaan Impianmu.</p>
        </div>
      </div>
    </div>
  </section><!-- End help Section -->

  <!-- ======= Loker Section ======= -->
  <section id="loker" class="loker section-bg">
    <div class="container px-5 py-5">

      <div class="section-title">
        <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up"
          style="font-family: 'Poppins', sans-serif; color: black; font-weight: 900; font-size: 4rem;">Lowongan
          Pekerjaan</h1>
        <h2 class="mt-5 mb-5" data-aos="fade-up"
          style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 46px;text-align: center;">Jelajahi
          Berbagai Lowongan Kerja Yang Ada Di Burscape</h2>
      </div>
      <div class="row g-5 justify-content-center">
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="me-3 ms-1" width="25px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                    </svg>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 " viewBox="0 0 576 512"
                      width="35px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                    </svg> 2 Lowongan</h6>
                </div>


              </div>
            </div>

            <div class="row d-flex">
              <div class="col-lg-12 col-md-3 col-sm-3 mb-2 ms-4 ">
                <button class="btn btn-primary rounded-pill btn-md d-flex justify-content-center "><i
                    class="fa-solid fa-check me-2 pt-1"></i>Actively Recruiting</button>
              </div>
              <div class="col mb-3">
                <button type="button" class="btn btn-primary" id="btn-created" style="
                                  font-size: 15px;
                                  line-height: 18px;
                                  background-color: #ffffff;
                                  border-color: #ffffff;
                                  color: #3A57E8;
                                  width: 200px; height: 33.92px;
                                  ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"
                    style="fill: #3A57E8" class="me-1">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                      d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                  </svg> 2 hours ago</button>
              </div>
            </div>

          </div>

        </div>
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="me-3 ms-1" width="25px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                    </svg>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 " viewBox="0 0 576 512"
                      width="35px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                    </svg> 2 Lowongan</h6>
                </div>


              </div>
            </div>

            <div class="row d-flex">
              <div class="col-lg-12 col-md-3 col-sm-3 mb-2  ">
                <button class="btn btn-primary rounded-pill btn-md d-flex justify-content-center ms-4  "><i
                    class="fa-solid fa-check me-2 pt-1"></i>Actively Recruiting</button>
              </div>
              <div class="col mb-3">
                <button type="button" class="btn btn-primary" id="btn-created" style="
                                  font-size: 15px;
                                  line-height: 18px;
                                  background-color: #ffffff;
                                  border-color: #ffffff;
                                  color: #3A57E8;
                                  width: 200px; height: 33.92px;
                                  ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"
                    style="fill: #3A57E8" class="me-1">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                      d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                  </svg> 2 hours ago</button>
              </div>
            </div>

          </div>

        </div>
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="me-3 ms-1" width="25px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                    </svg>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 " viewBox="0 0 576 512"
                      width="35px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                    </svg> 2 Lowongan</h6>
                </div>


              </div>
            </div>

            <div class="row d-flex">
              <div class="col-lg-12 col-md-3 col-sm-3 mb-2  ">
                <button class="btn btn-primary rounded-pill btn-md d-flex justify-content-center ms-4 "><i
                    class="fa-solid fa-check me-2 pt-1"></i>Actively Recruiting</button>
              </div>
              <div class="col mb-3">
                <button type="button" class="btn btn-primary" id="btn-created" style="
                                  font-size: 15px;
                                  line-height: 18px;
                                  background-color: #ffffff;
                                  border-color: #ffffff;
                                  color: #3A57E8;
                                  width: 200px; height: 33.92px;
                                  ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"
                    style="fill: #3A57E8" class="me-1">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                      d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                  </svg> 2 hours ago</button>
              </div>
            </div>

          </div>

        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column  ">
          <a type="button" href="https://getbootstrap.com/docs/5.2/components/navs-tabs/"
            class="btn btn-outline-primary btn-lg me-3 ">Learn More</a>
        </div>
      </div>

    </div>




    </div>


    </div>
  </section>
  <!-- End Loker Section -->

  <!-- ======= Perusahaan Section ======= -->
  <section id="perusahaan" class="perusahaan">
    <div class="container px-5 py-5">

      <div class="section-title">
        <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up"
          style="font-family: 'Poppins', sans-serif; color: black; font-weight: 900; font-size: 4rem;">PERUSAHAAN</h1>
        <h2 class="mt-5 mb-5" data-aos="fade-up"
          style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 46px;text-align: center;">Jelajahi
          Berbagai Perusahaan Yang Berada Di Burscape</h2>
      </div>
      <div class="row g-5 justify-content-center">
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1" viewBox="0 0 384 512"
                      width="23px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                    </svg> <span style="visibility: hidden;">..</span>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px"
                      class="me-1">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                    </svg> 2 Lowongan</h6>
                </div>


              </div>
            </div>



          </div>

        </div>
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1" viewBox="0 0 384 512"
                      width="23px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                    </svg> <span style="visibility: hidden;">..</span>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px"
                      class="me-1">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                    </svg> 2 Lowongan</h6>
                </div>

              </div>
            </div>


          </div>

        </div>
        <div class="col-md-4">
          <div class="card " data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex justify-content-start">
              <div class="row d-flex justify-align-center">
                <img src="{{asset('images/icons/delesign-construction.svg')}}" alt="" class=".img-fluid. max-width: 100%;">
              </div>
              <div class="col d-flex mt-4 mx-0 flex-wrap">
                <div class="header-title">

                  <h5 class="col-lg-10 mb-0 me-5">Judul Lowongan</h4>
                    <p class="mb-0">
                      Nama Perusahaan
                    </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="mt-2" style="margin-left: 30px">
                <div class="ms-0">
                  <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1" viewBox="0 0 384 512"
                      width="23px">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                    </svg> <span style="visibility: hidden;">..</span>Jenis Pekerjaan</h6>
                </div>
                <div class="ms-0">
                  <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px"
                      class="me-1">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path
                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                    </svg> 2 Lowongan</h6>
                </div>
              </div>
            </div>



          </div>

        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column  ">
          <a type="button" href="https://getbootstrap.com/docs/5.2/components/navs-tabs/"
            class="btn btn-outline-primary btn-lg me-3 ">Learn More</a>
        </div>
      </div>

    </div>




    </div>


    </div>
  </section>
  <!-- End Perusahaan Section -->

  <!-- ======= about Section ======= -->
  <section id="about" class="about">
    <div class="container px-5 py-5">


      <div class="row">
        <div class="col-lg-5">
          <div class="card" id="about-card1">
            <div class="card-body mb-5">
              <h5 class="card-title mb-2 ms-5">About Burscape</h5>
              <p class="card-text ms-5">Burscape adalah sebuah wadah yang mempertemukan lulusan dengan lowongan pekerjaan
                dari berbagai perusahaan yang ada dan sesuai dengan bidang yang diinginkan.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card" id="about-card2">
            <div class="card-body mb-5">
              <h5 class="card-title mb-2 ms-5">Our Mission</h5>
              <div class="col-md-11">
              <p class="card-text ms-5">Tujuan Kami adalah untuk menciptakan sebuah jaringan yang memudahkan lulusan SMKN 4
                Bandung untuk mencari lapangan pekerjaan. Kami percaya bahwa lulusan SMK dapat menjadi sumber daya
                manusia
                yang terampil dan kompeten dalam dunia industri.</p>
              </div>
            </div>
          </div>
        </div>




      </div>


    </div>
  </section>
  <!-- End about Section -->
  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2 id="ourteam">Our Team</h2>
      </div>

      <div class="row">

        <div class="col-lg-6">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{asset('images/team/team1.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Dhafin Qintara Khalish</h4>
              <span>CEO</span>
              <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="{{asset('images/team/team2.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Arsyl Slamet Amrulloh</h4>
              <span>CTO</span>
              <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="{{asset('images/team/team3.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Fajri Zhahiran Wiriadinata</h4>
              <span>COO</span>
              <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mb-4">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="{{asset('images/team/team4.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Dio Fathir Zinedine Khalaf</h4>
              <span>CMO</span>
              <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->
  <!--Section: Contact-->
  <section id="contact" id="contact">
    <div class="text-center mt-4">
      <!-- Heading -->
      <h2 class="mb-1 font-weight-bold text-center mt-4" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 36px;
        line-height: 54px;">CONTACT US</h2>
              <p class="font-weight-bold" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-style: normal;
        font-size: 24px;color: #B1ACAC;">Let's Work Together</p>
      <hr class="mx-auto pt-1" style="width: 230px;" , size="4" , color=black> <br><br><br>

    </div>
    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-5 col-md-12">
        <!-- Form contact -->
        <form class="p-5 grey-text">
          <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
            <label for="form3">Your name</label>
            <input type="text" id="form3" class="form-control form-control-sm">

          </div>
          <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
            <label for="form2">Your email</label>
            <input type="text" id="form2" class="form-control form-control-sm">

          </div>
          <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
            <label for="form34">Subject</label>
            <input type="text" id="form32" class="form-control form-control-sm">

          </div>
          <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
            <label for="form8">Your message</label>
            <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4"></textarea>

          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
          </div>
        </form>
        <!-- Form contact -->
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-7 col-md-12">

        <!--Grid row-->
        <div class="row text-center">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="map-area">
              <iframe allowfullscreen
                src="https://maps.google.com/maps?q=SMKN%204%20Bandung&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
          </div>


        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

  </section>



  <!--Section: Contact-->

  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">

            <img src="{{asset('images/icons/Burscapelogo(no-caption).png')}}" width="300px" heigth="300px" class="pe-3">


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
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 footer-links">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>

          <div class="container">
            <div class="copyright">
              &copy; Copyright <strong><span>Bootsrap</span></strong>. All Rights Reserved
            </div>
          </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>->
</x-app-layout>
@endsection
