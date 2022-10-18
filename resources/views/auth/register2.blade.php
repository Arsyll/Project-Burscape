<x-guest-layout>
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                <img src="{{ asset('images/background/smkn4.jpg') }}" class="img-fluid gradient-main animated-scaleX"
                    alt="images">
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                            <div class="card-body">
                                <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center mb-3">
                                    <img width="50" src="{{ asset('images/icons/Burscapelogo(no-caption).png') }}">
                                    <h4 class="logo-title ms-3">{{ env('APP_NAME') }}</h4>
                                </a>
                                <h2 class="mb-2 text-center">Sign Up</h2>
                                <p class="text-center">Create your {{ env('APP_NAME') }} account.</p>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('register') }}" data-toggle="validator">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="tahun_lulusan" class="form-label">Tahun Lulusan</label>
                                                <input id="tahun_lulusan" name="tahun_lulusan"
                                                    value="{{ old('tahun_lulusan') }}" class="form-control"
                                                    type="text" placeholder=" " required autofocus>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <input class="form-control" type="text" name="status"
                                                    placeholder=" " value="{{ old('status') }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check mb-3">
                                            <label class="form-check-label" for="customCheck1">I agree with the terms of
                                                use</label>
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                required>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary"> {{ __('sign up') }}</button>
                                    </div>
                                    <p class="mt-3 text-center">
                                        Already have an Account <a href="{{ route('auth.signin') }}"
                                            class="text-underline">Sign In</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg sign-bg-right">
                    <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                                transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
