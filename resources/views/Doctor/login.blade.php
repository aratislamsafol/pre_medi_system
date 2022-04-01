@extends('layouts.login_reg_page')
@section('main_content')
    {{-- @include('sweetalert::alert') --}}
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-header m-auto">
                                    <a href="{{ route('super_admin.login') }}" class="btn btn-primary">Admin</a>
                                    <a href="{{ route('doctor.login') }}" class="btn btn btn-info">Doctor</a>
                                    <a href="{{ route('login') }}" class="btn btn-success">Patient</a>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('doctor.data.save') }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input id="inputEmail" type="email" placeholder="name@example.com"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{ route('doctor.register') }}">Need an account?
                                            Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">


                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
