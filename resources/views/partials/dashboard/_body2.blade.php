<div id="loading">
    @include('partials.dashboard._body_loader')
</div>
<main class="main-content">
@include('partials.dashboard._body_header1')
    @if (\Route::currentRouteNamed('landingPage') || \Route::currentRouteNamed('about'))
    @else
    <div class="container-fluid content-inner">
    {{ $slot }}
    </div>
    @endif
    @include('partials.dashboard._body_footer')
</main>
@include('partials.dashboard._scripts')
