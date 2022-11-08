<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">


        <!-- Favicons -->
        <link href="{{asset('images/favicon.ico')}}" rel="icon">
        <link href="{{asset('images/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/f7b6c5abe9.js" crossorigin="anonymous"></script>
        <!-- Template Main CSS File -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');
        </style>
        @yield('css')

    </head>

    <body>
        
        @yield('content')
        


        @yield('js')
        <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>
         <!-- Vendor JS Files -->
        <script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
        <script src="{{asset('vendor/aos/aos.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
        {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}

        <!-- Template Main JS File -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>