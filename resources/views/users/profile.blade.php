<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mt-5">
                <div class="card-body ms-3">

                    <div class="d-flex flex-wrap align-items-center">
                        <div class="profile-img position-relative me-3 mb-5 mb-lg-3">
                            <img src="{{ auth()->user()->foto_profile() == asset('storage/profile_alumni/') ? asset('images/avatars/01.png') : auth()->user()->foto_profile()}}" alt="User-Profile"
                                class="theme-color-default-img img-fluid rounded-pill avatar-100">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h3 class="me-2 ">{{ $data->full_name() ?? 'Austin Robertson'  }}</h3>
                        <div class="d-flex">
                            <form method="POST" action="{{route('download.resume',$data->user_role->alumni->id)}}">
                                @csrf
                                <a href="{{route('users.edit',$data->id)}}" class="btn btn-primary btn-sm ms-3">Edit Profile</a>
                                @if (!empty($data->user_role->alumni->resume))
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
                        <div class="col-md-7 ">
                            {!! !empty($data->user_role->alumni->tentang) ? $data->user_role->alumni->tentang : '<a href="/users/'.$data->id.'/edit">Masukan Biodata Dirimu!</a>' !!}
                        </div>
                        <span class="text-capitalize fs-6 text-secondary ">{{$data->user_role->alumni->alamat}}</span>
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
                            <a href="{{route('users.edit',$data->id)}}">Masukan Biodata Dirimu!</a>
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
                            <a href="{{route('users.edit',$data->id)}}">Masukan Biodata Dirimu!</a>
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


           @if ($data->user_role->alumni->tentang == "" || $data->user_role->alumni->alamat == "" || $data->user_role->alumni->foto_profile == "" || $data->user_role->alumni->resume == "" || $pengalaman->count() == 0 || $edukasi->count() == 0)
            <div class="card">
                    <div class="card-header">
                        <div class="header-title d-flex">
                            <h4 class="card-title">Lengkapi Profil </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-inline m-0 p-0">
                            @if ($data->user_role->alumni->tentang == "" || $data->user_role->alumni->alamat == "")
                            <li class="d-flex mb-2">
                                <p class="news-detail mb-0"><a href="#">+ Informasi Dasar</a></p>
                            </li>
                            @endif
                            @if ($data->user_role->alumni->foto_profile == "")
                            <li class="d-flex mb-2">
                                <p class="news-detail mb-0"><a href="#">+ Foto Profile</a></p>
                            </li>
                            @endif
                            @if ($data->user_role->alumni->resume == "")
                            <li class="d-flex mb-2">
                                <p class="news-detail mb-0"><a href="#">+ Resume</a></p>
                            </li>
                            @endif
                            @if ($pengalaman->count() == 0)
                            <li class="d-flex mb-2">
                                <p class="news-detail mb-0"><a href="#">+ Riwayat Pengalaman</a></p>
                            </li>
                            @endif
                            @if ($edukasi->count() == 0)
                            <li class="d-flex mb-2">
                                <p class="news-detail mb-0"><a href="#">+ Riwayat Edukasi</a></p>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
           @else
            <div class="card">
                <div class="card-header">
                    <div class="header-title d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                          </svg>
                        <h4 class="ms-2 card-title pb-4">Profile Sudah Lengkap</h4>
                    </div>
                </div>
            </div>
           @endif



            @include('partials.components.share-offcanvas')
</x-app-layout>
