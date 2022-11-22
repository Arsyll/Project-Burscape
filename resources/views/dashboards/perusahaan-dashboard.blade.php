<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>
    <script src="lazysizes.min.js"></script>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="d-slider1 overflow-hidden ">
                    {{-- <div class="card" data-aos="fade-up" data-aos-delay="300">
                      <div class="card-body d-flex justify-content-around text-center">
                         <div>
                            <h2 class="mb-2">750<small>K</small></h2>
                            <p class="mb-0 text-secondary">Website Visitors</p>
                         </div>
                         <hr class="hr-vertial">
                         <div>
                            <h2 class="mb-2">7,500</h2>
                            <p class="mb-0 text-secondary">New Customers</p>
                         </div>
                      </div>
                   </div> --}}

                    <div class="row mx-2 gs-2" >
                        <div class="col-md-6 col-lg-3">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4 "><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 ">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 ">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 ">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 ">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 ">
                            <div class="card " data-aos="fade-up" data-aos-delay="400">
                                <div class="d-flex justify-content-start">
                                    <div class="row d-flex justify-align-center">
                                        {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                                        @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}
                                        <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                            alt="" class=".img-fluid. max-width: 100%;">
                                    </div>
                                    <div class="col d-flex mt-4 mx-0 flex-wrap">
                                        <div class="header-title">

                                            <h5 class="col-lg-10 mb-0 me-5">Lowongan Baru</h4>
                                                <p class="mb-0">
                                                    Kota, Indonesia
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-2" style="margin-left: 30px">
                                        <div class="ms-0">
                                            <h6 class="mb-3 "><svg xmlns="http://www.w3.org/2000/svg" class="ms-1"
                                                    viewBox="0 0 384 512" width="23px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M384 0H0V512H144V384h96V512H384V0zM64 224h64v64H64V224zm160 0v64H160V224h64zm32 0h64v64H256V224zM128 96v64H64V96h64zm32 0h64v64H160V96zm160 0v64H256V96h64z" />
                                                    </svg> Jenis Pekerjaan</h6>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512" width="30px">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
                                                    </svg> 2 Lowongan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($perusahaan as $pr)

                    @endforeach
                     <!-- Pagination |yang berubah|-->
    <div class="d-flex justify-content-center m-5">
        {{ $perusahaan->links() }}
    </div>
    <!--  -->
                        {{-- <div class="col-md-12 col-lg-4">
          <div class="row">
             <div class="col-md-6 col-lg-12">
                <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
                   <div class="card-header pb-4 border-0">
                      <div class="p-4 primary-gradient-card rounded border border-white">
                         <div class="d-flex justify-content-between align-items-center">
                            <div>
                               <h5 class="font-weight-bold">{{auth()->user()->username}} </h5>
                        <P class="mb-0">{{auth()->user()->user_role->admin->jabatan}}</P>
                    </div>
                    <div class="master-card-content">
                        <svg class="master-card-1" width="60" height="60" viewBox="0 0 24 24">
                            <path fill="#ffffff"
                                d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                        <svg class="master-card-2" width="60" height="60" viewBox="0 0 24 24">
                            <path fill="#ffffff"
                                d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="300">
        <div class="card-body d-flex justify-content-around text-center">
            <div>
                <h2 class="mb-2">750<small>K</small></h2>
                <p class="mb-0 text-secondary">Website Visitors</p>
            </div>
            <hr class="hr-vertial">
            <div>
                <h2 class="mb-2">7,500</h2>
                <p class="mb-0 text-secondary">New Customers</p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div> --}}
    </div>

    <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>
</x-app-layout>
