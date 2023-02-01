<head>
    <title>Notifikasi</title>
</head>
<x-app-layout layout="horizontal" :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
           <div class="card rounded">
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-12 d-flex justify-content-between">
                       <div class="">
                           <h4 class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifikasi</h4>
                       </div>
                        <div class="">
                            @if (auth()->user()->countUnreadedNotification() > 0)
                            <button type="button" class="btn btn-primary btn-sm" id="mark_read">Mark All As Readed</button>
                            @endif
                        </div>                       
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-12 mt-4">
                        <div class="accordion" id="accordionExample">
                            @if (auth()->user()->notifikasi->count() == 0)
                                <p class="text-secondary text-center">Tidak Ada Notifikasi</p>
                            @else
                            @foreach ($notifikasi as $n)
                            <div class="accordion-item">
                                <h4 class="accordion-header text-left" id="heading{{$n->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$n->id}}" aria-expanded="false" aria-controls="collapse{{$n->id}}">
                                        @if (!$n->dibaca)
                                        <span class="badge rounded-pill bg-danger p-1 me-1" id="unreaded-dot"> </span>
                                        @endif    
                                        {{$n->subjek}}
                                    </button>
                                </h4>
                                <div id="collapse{{$n->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$n->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$n->pesan}}
                                        <p class="p-0 m-0 text-end">
                                            {{$n->createdAt()}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                          </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
</x-app-layout>