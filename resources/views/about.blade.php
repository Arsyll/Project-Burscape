<x-app-layout layout="horizontal" :assets="$assets ?? []">
    @extends('base.main')
    @section('title')
        Burscape - Link To Opportunities
    @endsection
    @section('content')
        <!-- ======= about Section ======= -->
        <section id="about" class="about">
            <div class="container px-5 py-5" id="featured-3">
                <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up"
                    style="font-family: 'Poppins', sans-serif; color: black; font-weight: 900; font-size: 4rem;">About
                    Burscape
                </h1>
                <h3 class="mt-4 mb-3" data-aos="fade-up"
                    style="font-family: 'Poppins', sans-serif; font-weight: 500;text-align: center;">
                    Burscape adalah sebuah wadah yang mempertemukan lulusan dengan lowongan pekerjaan
                    dari berbagai perusahaan yang ada dan sesuai dengan bidang yang diinginkan.</h3>

            </div>
        </section>
        <!-- End about Section -->
        <!-- ======= ourquest Section ======= -->
        <section id="ourquest" class="ourquest" style="background-color: #2478FF ;color:white">

            <div class="container px-5 py-5" id="featured-3">
                <h1 class="pb-2 text-center bold mb-3" data-aos="fade-up"
                    style="font-family: 'Poppins', sans-serif; color: white; font-weight: 900; font-size: 4rem;">Our Mission
                </h1>
                <h3 class="mt-4 mb-3" data-aos="fade-up"
                    style="font-family: 'Poppins', sans-serif; color: white;font-weight: 500;text-align: center;">
                    Tujuan Kami adalah untuk menciptakan sebuah jaringan yang memudahkan lulusan SMKN 4
                    Bandung untuk mencari lapangan pekerjaan. Kami percaya bahwa lulusan SMK dapat menjadi sumber daya
                    manusia
                    yang terampil dan kompeten dalam dunia industri.</h3>

            </div>
        </section>
        <!-- End ourquest Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2 id="ourteam">Our Team</h2>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="{{ asset('images/team/team1.jpg') }}" class="img-fluid"
                                    alt=""></div>
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
                            <div class="pic"><img src="{{ asset('images/team/team2.jpg') }}" class="img-fluid"
                                    alt=""></div>
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
                            <div class="pic"><img src="{{ asset('images/team/team3.jpg') }}" class="img-fluid"
                                    alt=""></div>
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
                            <div class="pic"><img src="{{ asset('images/team/team4.jpg') }}" class="img-fluid"
                                    alt=""></div>
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
                <h2 class="mb-1 font-weight-bold text-center mt-4"
                    style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
font-style: normal;
font-weight: 700;
font-size: 36px;
line-height: 54px;">
                    CONTACT US</h2>
                <p class="font-weight-bold"
                    style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
font-style: normal;
font-size: 24px;color: #B1ACAC;">
                    Let's Work Together</p>
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

    </x-app-layout>
@endsection
