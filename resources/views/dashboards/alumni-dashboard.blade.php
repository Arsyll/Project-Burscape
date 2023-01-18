<head>
    <title>Lowongan Kerja</title>
</head>
<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <style>
        #btnNew:checked {
            background-color: #3A57E8;
            color: black;
        }

    </style>
    <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>
    <script src="lazysizes.min.js"></script>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <form action="{{url('lowongan')}}" method="GET">
                        <h3 class="font-weight-bold ms-3 mt-4">Filter Pencarian</h3>
                        <hr>
                        <div class="ms-3 me-3" data-filter="search">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Nama Lowongan..." value="@if(!empty(request()->input('filter.search'))){{ request()->input('filter.search') }}@elseif(!empty(request()->input('search'))){{ request()->input('search') }}@endif">
                        </div>
                        <hr>
                        <div class="ms-3" data-filter="orderby">
                            <h6 class="font-weight-bold mb-3">Tampilkan Berdasarkan</h6>
                            <p>
                                <input type="radio" class=" btn-check " style="border-radius: 25px; " id="option1" autocomplete="off" name="waktu" value="Paling Sesuai"
                                {{request()->input('filter.waktu') == "Paling Sesuai" ? 'checked' : ''}}
                                @if(request()->input('filter.waktu') == ""){
                                    checked
                                }
                                @endif
                                />
                                <label class="btn btn-primary my-2" style="border-radius: 25px; " for="option1">Paling Sesuai</label>
                                <input type="radio" class="btn-check" style="border-radius: 25px; " id="option2" autocomplete="off" name="waktu" value="Terbaru"
                                {{request()->input('filter.waktu') == "Terbaru" ? 'checked' : ''}}
                                />
                                <label class="btn btn-primary" style="border-radius: 25px; " for="option2">Terbaru</label>
                            </p>
                            <hr>
                        </div>
                        <div class="ms-3" data-filter="condition">
                            <h6 class="font-weight-bold mb-3">Tipe Pekerjaan</h6>
    
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="tipe" value="Full-time" id="condition-checkbox"
                                @if (in_array('Full-time', explode(',', request()->input('filter.tipe'))))
                                    checked
                                @endif
                                >
                                <label class="form-check-label text-muted" for="condition-checkbox">
                                    Full-time
                                </label>
                            </div>
    
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="tipe" value="Part-time" id="condition-checkbox2"
                                @if (in_array('Part-time', explode(',', request()->input('filter.tipe'))))
                                    checked
                                @endif
                                >
                                <label class="form-check-label text-muted" for="condition-checkbox2">
                                    Part-time
                                </label>
                            </div>
    
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="tipe" value="Magang" id="condition-checkbox3"
                                @if (in_array('Magang', explode(',', request()->input('filter.tipe'))))
                                    checked
                                @endif>
                                <label class="form-check-label text-muted" for="condition-checkbox3">
                                    Magang
                                </label>
                            </div>
    
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tipe" value="Freelance" id="condition-checkbox4"
                                @if (in_array('Freelance', explode(',', request()->input('filter.tipe'))))
                                    checked
                                @endif
                                >
                                <label class="form-check-label text-muted" for="condition-checkbox4">
                                    Freelance
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-4 ms-3">
                            <h6 class="font-weight-bold mb-3">Kategori Pekerjaan</h6>
    
                            @foreach ($kategori as $k)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="kategori" value="{{$k->nama_kategori}}" id="price-checkbox"
                                @if (in_array($k->nama_kategori, explode(',', request()->input('filter.kategori'))))
                                    checked
                                @endif
                                >
                                <label class="form-check-label  text-muted" for="price-checkbox">
                                    {{$k->nama_kategori}}
                                </label>
                            </div>
                            @endforeach
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button type="button" id="filter" class="btn btn-primary btn-rounded w-75 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                                  Cari Lowongan Kerja
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col">
                <div class="row g-2">
                    @if ($lowongan->count() == 0);
                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="card">
                            <div class="text-center my-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                </svg>
                                <p class="mt-2">Lowongan Tidak Tertemukan</p>
                            </div>
                        </div>
                    </div>
                    @else
                    @foreach ($lowongan as $l)
                    <div class="col-md-6">
                        <div class="card " data-aos="fade-up" data-aos-delay="400">
                            <div class="d-flex justify-content-start">
                                <div class="row d-flex justify-align-center">
                                    {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/icons/delesign-construction.svg") }}
                                    @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid"
                                    alt="">
                                    --}}
                                    <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/icons/delesign-construction.svg") : $perusahaan->foto_perusahaan }}"
                                        alt="" class=".img-fluid. max-width: 100%;">
                                </div>
                                <div class="col d-flex mt-4 mx-0 flex-wrap">
                                    <div class="header-title">

                                        <h5 class="col-lg-10 mb-0 me-5">{{$l->nama_lowongan}}</h4>
                                            <p class="mb-0">
                                                {{$l->perusahaan->nama}}
                                            </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mt-2" style="margin-left: 30px">
                                    <div class="ms-0">
                                        <h6 class="mb-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="me-3 ms-1"
                                                width="25px">
                                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                                            </svg>{{$l->alamat}}</h6>
                                    </div>
                                    <div class="ms-0">
                                        <h6 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 "
                                                viewBox="0 0 576 512" width="35px">
                                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                                            </svg>@rupiah($l->salary)</h6>
                                    </div>


                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="col-lg-12 col-md-3 col-sm-3 mb-2  ">
                                    <a href="{{route('detail.lowongan' , $l->id)}}"
                                        class="btn btn-primary rounded-pill btn-md d-flex justify-content-center mx-4 "><i
                                            class="fa-solid fa-check me-2 pt-1"></i>Menerima Lowongan</a>
                                </div>
                                <div class="col mb-3">
                                    <button type="button" class="btn btn-primary" id="btn-created" style="
                                                font-size: 15px;
                                                line-height: 18px;
                                                background-color: #ffffff;
                                                border-color: #ffffff;
                                                color: #3A57E8;
                                                width: 250px; height: 33.92px;
                                                ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"
                                            style="fill: #3A57E8" class="me-1">
                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                                        </svg> {{$l->updatedAt()}}</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach
                    {{ $lowongan->appends(request()->input())->links(); }}
                    @endif
                </div>
            </div>




        </div>


    </div>
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
            <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
        </svg>
        <svg class="master-card-2" width="60" height="60" viewBox="0 0 24 24">
            <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
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
    <script>
        function getIds(checkboxName) {
            let checkBoxes = document.getElementsByName(checkboxName);
            let ids = Array.prototype.slice.call(checkBoxes)
                            .filter(ch => ch.checked==true)
                            .map(ch => ch.value);
            return ids;
        }
        function getWaktu(radio){
            let radios = document.getElementsByName(radio);
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    return radios[i].value;
                    break;
                }
                }
        }
        function getSearch(search){
            let searchs = document.getElementById(search);
            return searchs.value;
        }
    
        function filterResults () {
            let waktu = getWaktu("waktu");
            let tipe = getIds("tipe");
    
            let kategori = getIds("kategori");

            let search = getSearch("search");

            let href = 'lowongan?';
    
            if(tipe.length) {
                href += 'filter[tipe]=' + tipe;
            }
    
            if(kategori.length) {
                href += '&filter[kategori]=' + kategori;
            }
            if(waktu != ""){
                href += '&filter[waktu]=' + waktu;
            }
            if(search != ""){
                href += '&filter[search]=' + search;
            }
    
            document.location.href=href;
        }
    
        document.getElementById("filter").addEventListener("click", filterResults);
    </script>
    
</x-app-layout>
