@extends('layouts.auth')
@section('content')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">VloggerStudio</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your username &amp; password to login</p>
                            </div>

                                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.login') }}">
                                    @csrf

                                <div class="col-12">
                                    <label class="form-label">{{ __('Email') }}</label>
                                    <input type="email" placeholder="Email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           id="email" name="email"
                                           @if(Cookie::has('email'))
                                           value="{{ Cookie::get('email') ?? old('email') }}"
                                           @else
                                           value="{{ old('email') }}"
                                           @endif required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" placeholder="Password"
                                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           @if(Cookie::has('password'))
                                           value="{{ Cookie::get('password') }}"
                                           @endif required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                        <label class="form-check mb-0" for="remember">
                                            <input type="checkbox" class="form-check-input" style="float: none; margin-top: 5px"
                                                   name="remember" id="remember"
                                                   @if(Cookie::has('email')) checked @endif>
                                            <span class="form-check-label font-14">{{__('Remember Me')}}</span>
                                        </label>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="#">Create an account</a></p>
                                </div>
                            </form>




                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
