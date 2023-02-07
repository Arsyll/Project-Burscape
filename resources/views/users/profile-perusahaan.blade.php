<head>
    <title>Profile | {{$data->user_role->perusahaan->nama}}</title>
</head>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row flex-lg-row align-items-center g-5 py-2">
                        <div class="col-2 col-sm-3  col-lg-2">
                            <img src="{{ empty($data->user_role->perusahaan->foto_perusahaan) ? asset('images/icons/delesign-construction.svg') : $data->user_role->perusahaan->profile_image() }}"
                            alt="logo-perusahaan" class="theme-color-default-img img-fluid rounded-pill avatar-100"  width="200" height="200">
                        </div>
                        <div class="col-lg-9">
                            <div class="d-flex justify-content-end">
                              <a href="{{route('users.edit',$data->id)}}">Edit Profile</a>
                            </div>
                            <h3 class="mb-3 pb-2">{{ $data->user_role->perusahaan->nama  }}</h3>
                          {!! $data->user_role->perusahaan->tentang !!}
                        </div>
                      </div>
                    <div class="bd-example d-flex justify-content-end">
                        <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column">
                                @if (empty($data->user_role->perusahaan->url))
                                
                                @else
                                    <a type="button" href="{{$data->user_role->perusahaan->url}}" target="_blank"
                                        class="btn btn-outline-primary btn-lg me-3" ><i class="fa-solid fa-arrow-up-right-from-square me-2">
                                            </i>Lihat situs</a>
                                @endif
                        </div>
                                {{-- <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column">
                        <button type="button" class="btn btn-primary btn-lg" >Lihat lowongan
                            kerja</button>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title ms-3">Lowongan Saat Ini</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        @foreach ($data->user_role->perusahaan->lowongan as $l)
                        <li class="d-flex mb-4 align-items-center">
                            <div class="ms-3 flex-grow-1">
                               <a href="{{route('detail.lowongan',$l->id)}}" class="">{{$l->nama_lowongan}}</a>
                                <h6 class="mb-1" style="font-size: 15px;">{{$l->alamat}}</h6>
                                <p class="mb-0" style="font-size: 13px;">{{$l->updatedAt()}}</p>
                            </div>
                        </li>
                        <hr class="ms-3">
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3">
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
        </div> --}}
    </div>



    </div>


    @include('partials.components.share-offcanvas')
</x-app-layout>
