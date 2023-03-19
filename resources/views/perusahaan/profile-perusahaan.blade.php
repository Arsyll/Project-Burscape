<head>
    <title>Perusahaan | {{$perusahaan->nama}}</title>
</head>
<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row flex-lg-row align-items-center g-5 py-2">
                        <div class="col-2 col-sm-3  col-lg-2">
                            <img src="{{ empty($perusahaan->foto_perusahaan) ? asset('images/icons/delesign-construction.svg') : $perusahaan->profile_image() }}"
                            alt="logo-perusahaan" class="img-fluid ms-3"  width="200" height="200">
                        </div>
                        <div class="col-lg-9">
                          <h3 class="mb-3 pb-2">{{ $perusahaan->nama  }}</h3>
                          {!! $perusahaan->tentang !!}
                          <br>
                          <h5>Kontak</h5>
                            <span>{{$perusahaan->email}}</span><br>
                            <span>{{$perusahaan->no_telp}}</span><br>
                            <span>PIC : {{$perusahaan->nama_pic}}</span><br>
                            <span>Kontak PIC : {{$perusahaan->kontak_pic}}</span>
                        </div>
                      </div>
                    <div class="bd-example d-flex justify-content-end">
                        <div class="col-lg-3 col-md-4 col-sm-4 d-flex flex-column">
                                @if (empty($perusahaan->url))
                                
                                @else
                                    <a type="button" href="{{$perusahaan->url}}" target="_blank"
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
                @if ($perusahaan->lowongan->count() == 0)
                <div class="col-md-12">
                    <div class="card">
                        <div class="text-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                            </svg>
                            <p class="mt-2">Belum Menerima Lowongan Kerja</p>
                        </div>
                    </div>
                 </div>         
                @else
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        @foreach ($perusahaan->lowongan as $l)
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
                @endif
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
