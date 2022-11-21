<head>
   <title>Profile</title>
</head>
<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="d-flex flex-wrap align-items-center justify-content-between">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                        <img src="{{ !empty(auth()->user()->user_role->admin->foto_profile) ? auth()->user()->foto_profile() : asset('images/avatars/01.png')}}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                     </div>
                     <div class="">
                        <h4 class="me-2 h4">{{ $data->full_name() ?? 'Austin Robertson'  }}</h4>
                        <span class=""> {{ str_replace('_',' ',auth()->user()->role) ?? 'Marketing Administrator' }}</span>
                     </div>
                  </div>
                  <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" href="{{route('users.edit',$data->id)}}" role="tab">Edit Profile</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">About User</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="mt-2">
                  <h6 class="mb-1">Nama : </h6>
                  <p>{{$data->user_role->admin->nama_lengkap}}</p>
                  </div>
                  <div class="mt-2">
                  <h6 class="mb-1">Jabatan : </h6>
                  <p>{{$data->user_role->admin->jabatan}}</p>
                  </div>
                  <div class="mt-2">
                  <h6 class="mb-1">Email : </h6>
                  <p>{{$data->email}}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @include('partials.components.share-offcanvas')
</x-app-layout>
