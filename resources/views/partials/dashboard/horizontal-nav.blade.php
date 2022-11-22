<nav id="navbar_main" class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto">
   <div class="container-fluid">
      <div class="offcanvas-header">
         <div class="navbar-brand">
            <img src="{{asset('images/icons/Burscapelogo(no-caption).png')}}" class="img-fluid" style="max-height: 40px; max-width: 40px;" alt="Logo">
            <h4 class="logo-title">{{env('APP_NAME')}}</h4>
         </div>
         <button class="btn-close float-end"></button>
      </div>
      <div class="collapse navbar-collapse" id="navbarContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item"><a class="nav-link" href="{{URL('lowongan')}}"> Lowongan Kerja </a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('menu-style.dualhorizontal')}}"> Perusahaan </a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('menu-style.dualcompact')}}"><span class="item-name">Tentang</span></a></li>
               {{-- <li class="nav-item"><a class="nav-link" href="{{route('menu-style.boxed')}}"> Boxed Horizontal </a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('menu-style.boxedfancy')}}"> Boxed Fancy</a></li> --}}
         </ul>
      </div>
   </div> <!-- container-fluid.// -->
</nav>
