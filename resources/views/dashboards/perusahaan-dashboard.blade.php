<head>
    <title>Dashboard</title>
 </head>
 <x-app-layout :assets="$assets ?? []">
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
                <ul  class="swiper-wrapper list-inline m-0 p-0 mb-2">
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                      <div class="card-body">
                         <div class="progress-widget">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                               <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                               <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                             </svg>
                            <div class="progress-detail">
                               <p  class="mb-2">Total Lowongan</p>
                               <h4 class="counter">{{$totLowongan}}</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                      <div class="card-body">
                         <div class="progress-widget">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                               <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                               <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                             </svg>
                            <div class="progress-detail">
                               <p  class="mb-2">Total Lamaran</p>
                               <h4 class="counter">{{$totLamaran}}</h4>
                            </div>
                         </div>
                      </div>
                   </li>
                </ul>
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
             </div>
          </div>
       </div>
       <div class="col-md-12 col-lg-12">
          <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                   <div class="card-header d-flex justify-content-between flex-wrap">
                      <div class="header-title">
                         <h4 class="card-title mb-2">List Lowongan Kerja</h4>
                      </div>
                   </div>
                   <div class="card-body p-0">
                      <div class="table-responsive mt-4">
                         <table id="basic-table" class="table table-striped mb-0 w-100" role="grid">
                            <thead>
                               <tr>
                                  <th>NAMA</th>
                                  <th class="text-center">STATUS</th>
                                  <th class="text-center">JUMLAH LAMARAN</th>
                                  <th class="text-center">AKSI</th>
                               </tr>
                            </thead>
                            <tbody>
                              @foreach ($loker as $l)
                              <tr>
                                  <td>
                                     <div class="d-flex align-items-center">
                                        <h6>{{$l->nama_lowongan}}</h6>
                                     </div>
                                  </td>
                                  <td align="center"><span class="badge {{$l->status == "Aktif" ? 'bg-success' : 'bg-danger'}} p-2">{{$l->status}}</span></td>
                                  <td>
                                     <div class="text-center mb-2">
                                        <h6>{{$l->lamaran->count()}}</h6>
                                     </div>
                                   
                                  </td>
                                  <td class="text-center">
                                     <a href="{{route('lowongan-kerja.show',$l->id)}}" class="btn btn-primary">Lihat</a>
                                  </td>
                               </tr>
                              @endforeach
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          {{-- <div class="d-flex me-5">
              <div class="col-md-6 col-lg-6">
             <div class="card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-header d-flex justify-content-between flex-wrap">
                   <div class="header-title">
                      <h4 class="card-title mb-2">Lowongan Baru</h4>
                      <p class="mb-0">
                         <svg class ="me-2" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                         </svg>
                         16% this month
                      </p>
                   </div>
                </div>
                <div class="card-body">
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">$2400, Purchase</h6>
                         <span class="mb-0">11 JUL 8:10 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">New order #8744152</h6>
                         <span class="mb-0">11 JUL 11 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">Affiliate Payout</h6>
                         <span class="mb-0">11 JUL 7:64 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">New user added</h6>
                         <span class="mb-0">11 JUL 1:21 AM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-1">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">Product added</h6>
                         <span class="mb-0">11 JUL 4:50 AM</span>
                      </div>
                   </div>
                </div>
             </div>
          </div> --}}
          {{-- <div class="col-md-6 col-lg-6 ms-4">
             <div class="card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-header d-flex justify-content-between flex-wrap">
                   <div class="header-title">
                      <h4 class="card-title mb-2">Feed Back</h4>
                      <p class="mb-0">
                         <svg class ="me-2" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                         </svg>
                         16% this month
                      </p>
                   </div>
                </div>
                <div class="card-body">
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">$2400, Purchase</h6>
                         <span class="mb-0">11 JUL 8:10 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">New order #8744152</h6>
                         <span class="mb-0">11 JUL 11 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">Affiliate Payout</h6>
                         <span class="mb-0">11 JUL 7:64 PM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-2">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">New user added</h6>
                         <span class="mb-0">11 JUL 1:21 AM</span>
                      </div>
                   </div>
                   <div class=" d-flex profile-media align-items-top mb-1">
                      <div class="profile-dots-pills border-primary mt-1"></div>
                      <div class="ms-4">
                         <h6 class=" mb-1">Product added</h6>
                         <span class="mb-0">11 JUL 4:50 AM</span>
                      </div>
                   </div>
                </div>
             </div>
          </div> --}}
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
 </x-app-layout>
 