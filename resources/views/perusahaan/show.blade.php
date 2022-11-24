<head>
    <title>Perusahaan {{$perusahaan->nama}}</title>
</head>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row flex-lg-row align-items-center g-5 py-2">
                        <div class="col-2 col-sm-3 col-lg-2">
                            <img src="{{ empty($perusahaan->foto_perusahaan) ? asset("images/icons/delesign-construction.svg") : $perusahaan->profile_image() }}"
                            alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                          <h3 class="mb-3 pb-2">{{ $perusahaan->nama}}</h3>
                          <p><strong>Bidang</strong> : {{$perusahaan->bidang}}</p>
                          <p><strong>Email</strong> : {{$perusahaan->email_perusahaan}}</p>
                          <p><strong>Telp</strong> : {{$perusahaan->no_telp}}</p>
                          <p><strong>Alamat</strong> : {{$perusahaan->alamat}}</p>
                          <p><strong>Alamat Website</strong> : {{$perusahaan->url ? $perusahaan->url : '-'}}</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    
    
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ms-3">
                    <h4 class="me-2 ">Tentang</h4>
                    <div class="mt-4 mb-3">
                        <p class="text-justify text-black">{!! $perusahaan->tentang !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    </div>
</x-app-layout>