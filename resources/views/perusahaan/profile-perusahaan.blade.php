<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row flex-lg-row align-items-center g-5 py-2">
                        <div class="col-2 col-sm-3 col-lg-2">
                            <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/default/delesign-construction (1).svg") : $perusahaan->foto_perusahaan }}"
                            alt="" class="img-fluid">
                        </svg>
                        </div>
                        <div class="col-lg-9">
                          <h3 class="mb-3 pb-2">{{ $data->full_name() ?? 'Austin Robertson'  }}</h3>
                          <p class="text-justify text-black pb-5">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                        </div>
                      </div>
                    <div class="bd-example d-flex justify-content-end">
                        <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column">
                                <a type="button" href="https://getbootstrap.com/docs/5.2/components/navs-tabs/"
                            class="btn btn-outline-primary btn-lg me-3" ><i class="fa-solid fa-arrow-up-right-from-square me-2">
                                </i>Lihat situs</a>
                        </div>
                                <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column">
                        <button type="button" class="btn btn-primary btn-lg" >Lihat lowongan
                            kerja</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="card">
                <div class="card-body ms-3">
                    <h4 class="me-2 ">Tentang</h4>
                    <div class="mt-4 mb-3">
                        <p class="text-justify text-black">This is some placeholder content for the scrollspy page.
                            Note that as you
                            scroll down the page, the appropriate navigation link is highlighted. It's repeated
                            throughout the component example. We keep adding some more example copy here to
                            emphasize the scrolling and highlighting.</p>

                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title ms-3">Lowongan Saat Ini</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        <li class="d-flex mb-4 align-items-center">

                            <div class="ms-3 flex-grow-1">
                               <a href="" class="">Human Resource Project Manager</a>
                                <h6 class="mb-1" style="font-size: 15px;">Bandung</h6>
                                <p class="mb-0" style="font-size: 13px;">2 Jam yang lalu</p>
                            </div>
                        </li>
                        <hr class="ms-3">
                        <li class="d-flex mb-4 align-items-center">

                            <div class="ms-3 flex-grow-1">
                               <a href="" class="">Human Resource Project Manager</a>
                                <h6 class="mb-1" style="font-size: 15px;">Bandung</h6>
                                <p class="mb-0" style="font-size: 13px;">2 Jam yang lalu</p>
                            </div>
                        </li>
                        <hr class="ms-3">
                        <li class="d-flex mb-4 align-items-center">

                            <div class="ms-3 flex-grow-1">
                               <a href="" class="">Human Resource Project Manager</a>
                                <h6 class="mb-1" style="font-size: 15px;">Bandung</h6>
                                <p class="mb-0" style="font-size: 13px;">2 Jam yang lalu</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Gallery</h4>
                    </div>
                    <span>132 pics</span>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-card grid-cols-3">
                        <a data-fslightbox="gallery" href="{{asset('images/icons/04.png')}}">
                            <img src="{{asset('images/icons/04.png')}}" class="img-fluid bg-soft-info rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/shapes/02.png')}}">
                            <img src="{{asset('images/shapes/02.png')}}" class="img-fluid bg-soft-primary rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/icons/08.png')}}">
                            <img src="{{asset('images/icons/08.png')}}" class="img-fluid bg-soft-info rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/shapes/04.png')}}">
                            <img src="{{asset('images/shapes/04.png')}}" class="img-fluid bg-soft-primary rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/icons/02.png')}}">
                            <img src="{{asset('images/icons/02.png')}}" class="img-fluid bg-soft-warning rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/shapes/06.png')}}">
                            <img src="{{asset('images/shapes/06.png')}}" class="img-fluid bg-soft-primary rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/icons/05.png')}}">
                            <img src="{{asset('images/icons/05.png')}}" class="img-fluid bg-soft-danger rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/shapes/04.png')}}">
                            <img src="{{asset('images/shapes/04.png')}}" class="img-fluid bg-soft-primary rounded"
                                alt="profile-image">
                        </a>
                        <a data-fslightbox="gallery" href="{{asset('images/icons/01.png')}}">
                            <img src="{{asset('images/icons/01.png')}}" class="img-fluid bg-soft-success rounded"
                                alt="profile-image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>


    @include('partials.components.share-offcanvas')
</x-app-layout>
