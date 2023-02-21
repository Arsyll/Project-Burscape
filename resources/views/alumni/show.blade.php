<head>
    <title>Detail Alumni | {{ $alumni->nama }}</title>
</head>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div  class="pt-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('alumni')}}">Alumni</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail {{$alumni->nama}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-body ms-3">

                    <div class="d-flex flex-wrap align-items-center">
                        <div class="profile-img position-relative me-3 mb-5 mb-lg-3">
                            <img src="{{ $alumni->profile_image() == asset('storage/profile_alumni') ? asset('images/avatars/01.png')  : $alumni->profile_image() }}" alt="User-Profile"
                                class="theme-color-default-img img-fluid rounded-pill avatar-100">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h3 class="me-2 ">{{ $alumni->nama }}</h3>
                        <div class="d-flex">
                            <form method="POST" action="{{route('download.resume',$alumni->id)}}">
                                @csrf
                                @if (!empty($alumni->resume))
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                  onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('Download Resume') }}
                                </a>
                                @endif
                                </form>
                        </div>
                    </div>

                    {{-- <span class="text-capitalize text-black "
                        style="font-size: 18px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Web
                        Developer
                        {{ str_replace('_',' ',auth()->user()->user_type) ?? 'Marketing Administrator' }}</span> --}}

                    <div class="mt-4 mb-5">
                        <div class="col-md-12 ">
                            @if (!empty($alumni->tentang))
                            {!! $alumni->tentang !!}
                            @else
                            Belum Ada Keterangan.                                
                            @endif
                        </div>
                        <span class="text-capitalize fs-6 text-secondary ">Alamat : {{$alumni->alamat}}</span>
                    </div>
                    <hr>
                    <h6 class="mt-4">Status</h6>
                    @if (!empty($detailStatus))
                    <div class="col-md-12">
                        @if($detailStatus->nama_uni != "")
                        <div class="mt-2">
                            <span class="text-secondary">{{ $alumni->status . ' di ' .$detailStatus->nama_uni . $detailStatus->nama_usaha . $detailStatus->nama_perusahaan}}</span> <br>
                        </div>
                        <span class="text-secondary">Bidang {{ $detailStatus->nama_bidang}}</span>
                        <div class="mt-2">
                        </div>
                        <div class="mt-2">
                            <span class="text-secondary">{{$detailStatus->alamat}}</span>
                        </div>
                        @endif
                    </div>
                    @else
                    Belum Ada Keterangan.
                    @endif
                    <hr>
                    <h6 class="mt-4">Contact</h6>
                    <div class="col-md-12">
                        <div class="mt-2">
                            <span class="text-secondary">No Telp : {{$alumni->no_telp}}</span> <br>
                        </div>
                        <div class="mt-2">
                            <span class="text-secondary">{{$alumni->role_alumni->user->email}}</span>
                        </div>
                    </div>


                    {{-- <img src=@if(empty($perusahaan->foto_perusahaan)) {{ asset("images/default/delesign-construction.svg") }}
                    @else {{ $perusahaan->foto_perusahaan }} @endif class="img-fluid" alt=""> --}}

                </div>
            </div>

            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-body ms-3 mb-1">
                        <h4 class="me-2 ">Experience</h4>
                        <div class="mt-4 mb-1">
                            @if($pengalaman->count() != 0)
                                @foreach ($pengalaman as $p)
                                <div class="d-flex align-items-start flex-column mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                              </svg>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="ms-3 fw-bold text-black mb-1">{{$p->judul}}</h6>
                                            <span class="ms-3 fw-semi-bold text-black" style="font-size: 14px">{{$p->perusahaan}}</span>
                                            <span class="ms-3 text-secondary" style="font-size: 14px">{{$p->tahun}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                Belum Ada Keterangan.
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card ">
                    <div class="card-body ms-3 mb-1">
                        <h4 class="me-2 ">Education</h4>
                        <div class="mt-4 mb-1">
                            @if ($edukasi->count() != 0)
                                @foreach ($edukasi as $e)
                                <div class="d-flex align-items-start flex-column mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                                              </svg>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="ms-3 fw-bold text-black mb-1">{{$e->nama_lembaga}}</h6>
                                            <span class="ms-3 fw-semi-bold text-black" style="font-size: 14px">{{$e->bidang}}</span>
                                            <span class="ms-3 text-secondary" style="font-size: 14px">{{$e->tahun}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            Belum Ada Keterangan.
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-3 ">
            <div class="sticky-md-top pt-1">
            <div class="mb-3 mt-5 ">
               {{-- <select class="form-select" aria-label="Default select example">
            <option selected>Status</option>
            <option value="1">Bekerja</option>
            <option value="2">Kuliah</option>
            <option value="3">Freelance</option>
            </select> --}}
            </div>

            
            @if(auth()->user()->role == "Perusahaan")
                <div class="card">
                    <div class="card-header">
                        <div class="header-title d-flex">
                            <h5 class="card-title">Status : 
                            </h5>
                            <span class="badge rounded-pill p-2 ms-2 {{ ($lamaran->status == "Pending") ? "bg-secondary" : (($lamaran->status == "Diterima" )? "bg-success" : "bg-danger") }}">
                                {{ $lamaran->status }}
                        </div>
                    </div>
                    <div class="card-body">      
                        @if($lamaran->status == "Pending")
                        <button id="terima-btn" class="btn btn-success w-100 mb-2"  data-id="{{ $lamaran->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                            Terima
                        </button>
                        <button id="tolak-btn" class="btn btn-danger w-100"  data-id="{{ $lamaran->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Tolak
                        </button>
                        @else
                        <button id="batal-btn" class="btn btn-danger w-100 btn-sm"  data-id="{{ $lamaran->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Batalkan Lamaran
                        </button>
                        @endif
                    </div>
                </div>
            @endif

            <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
            <script>
                $(document).on('click', '#terima-btn', function () {
                    var id = $(this).data('id');
                    Swal.fire({
                        icon: 'question',
                        title: 'Anda yakin?',
                        text: "Anda akan menerima lamaran dari {{$alumni->nama}}.",
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#28C76F',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya!',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                'url': '{{url('lamaran-kerja')}}/' + id,
                                'type': 'POST',
                                'data': {
                                    '_method': 'PATCH',
                                    '_token': '{{csrf_token()}}',
                                    'status': 'Diterima'
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

                $(document).on('click', '#tolak-btn', function () {
                    var id = $(this).data('id');
                    Swal.fire({
                        icon: 'question',
                        title: 'Anda yakin?',
                        text: "Anda akan menolak lamaran dari {{$alumni->nama}}.",
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#28C76F',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya!',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                'url': '{{url('lamaran-kerja')}}/' + id,
                                'type': 'POST',
                                'data': {
                                    '_method': 'PATCH',
                                    '_token': '{{csrf_token()}}',
                                    'status': 'Ditolak'
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

                $(document).on('click', '#batal-btn', function () {
                    var id = $(this).data('id');
                    Swal.fire({
                        icon: 'question',
                        title: 'Anda yakin?',
                        text: "Anda akan membatalkan lamaran dari {{$alumni->nama}}.",
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#28C76F',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya!',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                'url': '{{url('lamaran-kerja')}}/' + id,
                                'type': 'POST',
                                'data': {
                                    '_method': 'PATCH',
                                    '_token': '{{csrf_token()}}',
                                    'status': 'Pending'
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
