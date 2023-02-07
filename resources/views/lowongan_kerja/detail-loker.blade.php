<head>
    <title>Lowongan Kerja | {{$lowongan->nama_lowongan}}</title>
</head>
<script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>
<x-app-layout layout="horizontal" :assets="$assets ?? []">
    {{-- @dd(auth()->user()->user_role->alumni->checkTerimaLamaran()) --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="row flex-lg-row g-5 py-2"> --}}
                        <div class="col-2 col-sm-3 col-lg-2 ">
                            {{-- <svg class="bd-placeholder-img mb-3" width="200" height="200"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label=""
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#D9D9D9"></rect><text x="35%" y="35%"
                                    fill="#000000" dy=".3em" dominant-baseline="hanging"
                                    style="font-size: 200%">logo</text>
                            </svg> --}}
                            <img src="{{!empty($lowongan->perusahaan->foto_perusahaan) ? $lowongan->perusahaan->profile_image() : asset('images/icons/delesign-construction.svg')}}" alt="logo" width="200" height="200" >
                        </div>
                        <div class="col-lg-9 ms-5 align-items-start">
                            <h3 class="mb-3 ">{{$lowongan->nama_lowongan}}</h3>
                            <div class="col">
                                <div class="mt-2">
                                    <div class="ms-0">
                                        <h6 class="mb-3 d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="me-3 ms-2"
                                            viewBox="0 0 576 512" width="30px">
                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                                        </svg>@rupiah($lowongan->salary)</h6>
                                        <h6 class="mb-3 d-flex align-items-center"><i
                                                class="fa-regular fa-building fa-2x ms-2 me-4"></i>{{$lowongan->perusahaan->nama}}</h6>
                                        <h6 class="mb-3 d-flex align-items-center "><span class="ms-1"><i
                                                    class="fa-regular fa-hourglass-half fa-2x me-4 ms-1"></i></span>{{$lowongan->tipe_pekerjaan}}
                                        </h6>
                                        <div class="col-lg-3 col-md-3 col-sm-4 d-flex flex-column mb-3 ms-2">
                                            <button
                                                class="btn btn-primary rounded-pill btn-sm d-flex justify-content-center "><i
                                                    class="fa-solid fa-check me-2 pt-1"></i>Menerima Lowongan</button>
                                        </div>
                                        <p class="mb-4 ms-2" style="font-size: 13px;"><i
                                                class="fa-regular fa-clock me-2"></i>Tayang {{$lowongan->createdAt()}} - Diperbarui
                                            {{$lowongan->updatedAt()}}</p>
                                        <div class="bd-example d-flex justify-content-start">
                                            <div class="col-lg-1 col-md-1 col-sm-2 d-flex flex-column ms-2">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg me-3" data-bs-toggle="modal" data-bs-target="#share"><i
                                                        class="fa-solid fa-share-nodes me-2 py-1"></i></button>
                                                     
                                                    <div class="modal fade" id="share" tabindex="-1" aria-labelledby="exampleModalLabels"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content col-12">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Share</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="icon-container d-flex justify-content-evenly text-center">
                                                                        <div class="smd">
                                                                            <i class=" img-thumbnail fab fa-twitter fa-2x"
                                                                                style="color:#4c6ef5;background-color: aliceblue"></i>
                                                                            <p>Twitter</p>
                                                                        </div>
                                                                        <div class="smd">
                                                                            <i class="img-thumbnail fab fa-facebook fa-2x"
                                                                                style="color: #3b5998;background-color: #eceff5;"></i>
                                                                            <p>Facebook</p>
                                                                        </div>
                                                                        <div class="smd">
                                                                            <i class="img-thumbnail fab fa-whatsapp fa-2x"
                                                                                style="color:  #25D366;background-color: #cef5dc;"></i>
                                                                            <p>Whatsapp</p>
                                                                        </div>
                                                                        <div class="smd">
                                                                            <i class="img-thumbnail fab fa-telegram fa-2x"
                                                                                style="color:  #4c6ef5;background-color: aliceblue"></i>
                                                                            <p>Telegram</p>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                            <div class="col-12 ">
                                                <h6 class="mx-3 mb-2" style="font-weight: 400">Page Link <span class="message"></span></h6>
                                                <div class="input-group mb-3 ms-3 ">
                                                    <input type="search" class="form-control"  aria-label="Search" id="myInput"
                                                      aria-describedby="search-addon" value="{{ route('detail.lowongan',$lowongan->id)}}" disabled/>
                                                      <button class="btn btn-light me-3" onclick="myFunction()" type="button" 
                                                      style="background-color:#ffffff ; border: none;"><i class="far fa-clone"></i></button>
                                                </div>
                                            </div>
                                                                    
                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                @if (!empty(auth()->user()))
                                                    @if(auth()->user()->role == "Alumni")
                                                        @if(!empty(auth()->user()->user_role->alumni->checkLamaran($lowongan->id)))
                                                            @if(auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status == "Ditolak")
                                                                <button type="button" class="btn btn-danger btn-lg">Anda {{auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status}} Di Lowongan Ini</button>    
                                                            @endif
                                                        @endif
                                                        @if(!auth()->user()->user_role->alumni->checkTerimaLamaran() && !(auth()->user()->user_role->alumni->getTerimaLamaran() == $lowongan->id))
                                                                <a href="{{route('detail.lowongan',auth()->user()->user_role->alumni->getTerimaLamaran())}}" class="btn btn-secondary btn-lg">Anda Sudah Diterima Di Lowongan Lain</a>
                                                        @elseif (!empty(auth()->user()->user_role->alumni->checkLamaran($lowongan->id)))
                                                            @if((auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status == "Diterima"))
                                                                <button type="button" class="btn btn-success btn-lg">{{auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status}}</button>
                                                            @elseif (auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status == "Pending")
                                                                <button type="button" class="btn btn-secondary btn-lg">{{auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->status}}</button>
                                                                <button class="btn btn-danger btn-lg" id="del-btn" href="#" data-id="{{auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->id}}">
                                                                    Batalkan Proses Lamaran
                                                                </button>
                                                            
                                                            @endif
                                                        @else
                                                            @if(auth()->user()->user_role->alumni->checkTerimaLamaran())
                                                                <button type="button" class="btn btn-primary btn-lg"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Lamar Sekarang</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h3 class="modal-title" id="exampleModalLabel">Apply to {{$lowongan->perusahaan->nama}}</h3>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body px-5 ">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img src="{{ empty(auth()->user()->user_role->alumni->foto_profile) ? asset('images/avatars/01.png') : auth()->user()->foto_profile()}}"
                                                                                        alt="User-Profile"
                                                                                        class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                                                                </div>
                
                                                                                <h3 class="me-2 d-flex justify-content-center">{{auth()->user()->user_role->alumni->nama}}</h3>
                                                                                {{-- <span
                                                                                    class="me-2 d-flex justify-content-center mb-5">Sedang
                                                                                    Berkuliah di Harvard University</span> --}}
                                                                                <form action="{{route('lamaran-kerja.store')}}" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="id_lowongan" value="{{$lowongan->id}}">
                                                                                <label for="exampleDataList"
                                                                                    class="form-label fs-4 fw-bold"
                                                                                    style="color:black">Contact Info</label>
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input class="form-control mb-4" type="email"
                                                                                        placeholder="Email Address"
                                                                                        name="email"
                                                                                        aria-label="Email Address"
                                                                                        value={{auth()->user()->email}}
                                                                                        >
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>No Telp</label>
                                                                                    <input class="form-control mb-5" type="number" maxlength="13" minlength="10"
                                                                                        placeholder="Phone Number"
                                                                                        name="no_telp"
                                                                                        value={{auth()->user()->user_role->alumni->no_telp}}
                                                                                        aria-label="Phone Number">
                                                                                </div>
                

                                                                                    @if (!empty(auth()->user()->user_role->alumni->resume))
                                                                                    <div class="d-flex">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="current" class="bi bi-check-circle mt-1 me-2" viewBox="0 0 16 16">
                                                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                                                        </svg>
                                                                                        <p class="me-2">Resume Sudah Tersimpan |</p>
                                                                                        <a href="{{route('users.edit',auth()->user()->id)}}">Ubah Resume</a>
                                                                                    </div>
                                                                                    @else
                                                                                    <div class="mb-3">
                                                                                        <label for="exampleDataList"
                                                                                        class="form-label fs-4 fw-bold"
                                                                                        style="color:black">Resume *</label>
                                                                                        <input class="form-control mb-3" type="file" name="resume" id="formFile">
                                                                                        <label for="exampleDataList"
                                                                                        class="form-label fw-semibold"
                                                                                        >* Upload file dalam format PDF / DOCX maks 4MB.</label>
                                                                                    </div>
                                                                                    @endif

                                                                                    @if (empty(auth()->user()->user_role->alumni->tentang) || empty(auth()->user()->user_role->alumni->foto_profile) || empty(auth()->user()->user_role->alumni->id_jurusan) || auth()->user()->user_role->alumni->edukasi->count() == 0 || auth()->user()->user_role->alumni->pengalaman->count() == 0)
                                                                                    <hr>
                                                                                    <p class="me-2">Lengkapi Profil Terlebih Dahulu | <a href="{{route('users.edit',auth()->user()->id)}}">Ubah Resume</a></p>
                                                                                    <div class="modal-footer mt-5">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary" disabled>Apply now</button>
                                                                                    @else
                                                                                        <hr>
                                                                                        <p class="text-justify " style="text-align: justify;" >Jawaban dan resume Anda akan disimpan secara otomatis untuk digunakan untuk melakukan pra-pengisian lamaran di masa depan dan meningkatkan pengalaman Anda di Burscape.
                                                                                        <div class="modal-footer mt-5">
                                                                                            <button type="button" class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Apply now</button>
                                                                                    @endif
                
                                                                                </form>
                                                                            </div>
                
                
                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @elseif(!empty(auth()->user()->user_role->alumni->checkPendingLamaran()))
                                                                <button type="button" class="btn btn-secondary btn-lg">Menunggu Lamaran Lain</button>

                                                                <a class="btn btn-danger btn-lg mt-2" href="{{url('lowongan/'.auth()->user()->user_role->alumni->checkPendingLamaran()->lowongan->id)}}">
                                                                    Batalkan Lamaran Lain
                                                                </a>
                                                                @else
                                                                <button type="button" class="btn btn-secondary btn-lg w-100">Anda Sudah Diterima Di Lowongan Lain</button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @elseif(auth())
                                                <a href="{{route('auth.signin')}}" class="btn btn-primary btn-lg">Lamar Sekarang</a>                                                    
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    {{-- </div> --}}
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ms-3">
                        <h4 class="me-2 ">Kategori Pekerjaan</h4>
                        <div class="mt-4 mb-3 d-flex">
                            @foreach ($lowongan->detailLoker as $detail)
                            <div class="d-flex flex-column mb-3 me-2">
                                <button
                                    class="btn btn-light rounded-pill btn-sm d-flex justify-content-center ">{{$detail->kategori->nama_kategori}}</button>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ms-3">
                            <h4 class="me-2 ">Deskripsi</h4>
                            <div class="mt-4 mb-3">
                                {!! $lowongan->deskripsi_lowongan !!}
                            </div>
                        </div>
                    </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ms-3">
                            <h4 class="me-2 ">Syarat</h4>
                            <div class="mt-4 mb-3 d-flex">
                                {!! $lowongan->syarat !!}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ms-3">
                            <h4 class="me-2 ">Tentang Perusahaan</h4>
                            <div class="mt-4 mb-3">
                                <div class="row">
                                    <div class="col-2 col-sm-3 col-lg-2 ">
                                        <img src="{{!empty($lowongan->perusahaan->foto_perusahaan) ? $lowongan->perusahaan->profile_image() : asset('images/icons/delesign-construction.svg')}}" alt="logo" width="200" height="200"
                                         class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                    </div>
                                    <div class="col-lg-8 align-items-start ms-1 ">
                                        <a href="{{route('perusahaan.detail',$lowongan->perusahaan->id)}}" class="fs-4">{{$lowongan->perusahaan->nama}}</a>
                                        <br>
                                        <p class="text-justify text-black">
                                            {!! $lowongan->perusahaan->tentang !!}
                                        </p>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>

            </div>


        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
        @if((auth()->user()->role == "Alumni"));
        <script>
            $(document).on('click', '#del-btn', function () {
                var id = $(this).data('id');
                Swal.fire({
                    icon: 'question',
                    title: 'Kamu yakin?',
                    text: "Kamu akan membatalkan lowongan {{auth()->user()->user_role->alumni->checkLamaran($lowongan->id)->lowongan->nama_lowongan ?? ''}}.",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#28C76F',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, batalkan!',
                    cancelButtonText: 'Cancel'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            'url': '{{url('lamaran-kerja')}}/' + id,
                            'type': 'POST',
                            'data': {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                document.location.reload(true);
                            }
                        });
                    } else {
                        console.log(`dialog was dismissed by ${result.dismiss}`)
                    }
                });
            });
            </script>
        @endif
            <script>
            function myFunction() {
                var moreText = document.getElementById("more");
                var btnText = document.getElementById("myBtn");
                var upIcon = document.getElementById("up");

                if (moreText.style.display === "none") {
                    moreText.style.display = "inline";
                    btnText.innerHTML = "Read less";

                } else {
                    btnText.innerHTML = "Read more";
                    moreText.style.display = "none";


                }
            }

            function buttonFunction() {
                var moreTexts = document.getElementById("lbhbanyak");
                var btnTexts = document.getElementById("myBtn2");
                var upIcon = document.getElementById("up");

                if (moreTexts.style.display === "none") {
                    moreTexts.style.display = "inline";
                    btnTexts.innerHTML = "Read less";

                } else {
                    btnTexts.innerHTML = "Read more";
                    moreTexts.style.display = "none";

                }
            }
            function myFunction() {
                // Get the text field
                var copyText = document.getElementById("myInput");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);
}
        </script>
        {{-- @include('partials.components.share-offcanvas') --}}
</x-app-layout>
@include('partials.dashboard._app_toast')
