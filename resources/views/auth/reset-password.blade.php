<x-guest-layout>
    <section class="login-content">
       <div class="row m-0 align-items-center bg-white vh-100">            
          <div class="col-md-6 p-0">    
             <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                <div class="card-body">
                   <a href="{{route('dashboard')}}" class="navbar-brand d-flex align-items-center mb-1">
                      <img width="50" src="{{ asset('images/icons/Burscapelogo(no-caption).png') }}">
                      <h4 class="logo-title ms-3">{{env('APP_NAME')}}</h4>
                   </a>
                   {{-- <img src="{{asset('images/auth/mail.png')}}" class="img-fluid" width="80" alt=""> --}}
                   <h2 class="mt-3 mb-1">Reset Password</h2>
                   <p class="cnf-mail mb-2">Masukan Password Baru Untuk Diubah.</p>
                   <x-auth-validation-errors class="mb-4" :errors="$errors" />
                  <form method="POST" action="{{route('password.update')}}">
                     @csrf
                     <input type="hidden" name="token" value="{{$request->route('token')}}">
                     <input type="hidden" name="email" value="{{$request->email}}">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="floating-label form-group">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" aria-describedby="email" placeholder=" ">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="floating-label form-group">
                              <label for="password_confirmation" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="email" placeholder=" ">
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary btn-block">  {{ __('Reset') }}</button>
                  </form>
                </div>
             </div>                  
          </div>
          <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
             {{-- <img src="{{asset('images/auth/03.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images"> --}}
             <img src="{{ asset('images/background/smkn4.jpg') }}" class="img-fluid gradient-main animated-scaleX"
             alt="images">
          </div>
       </div>
    </section>
 </x-guest-layout>