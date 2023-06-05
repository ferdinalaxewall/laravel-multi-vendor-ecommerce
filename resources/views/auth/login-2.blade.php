@extends('auth.layout.master')

@section('title', 'Log In')

@section('content')
<div class="card">
    <div class="card-body">

        <div class="text-center mt-4">
            <div class="mb-3">
                <a href="index.html" class="auth-logo">
                    <img src="{{ asset('admin/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                    <img src="{{ asset('admin/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                </a>
            </div>
        </div>

        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

        <div class="p-3">
            <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 text-center row mt-3 pt-1">
                    <div class="col-12">
                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group mb-0 row mt-2">
                    @if (Route::has('password.request'))
                    <div class="col-sm-7 mt-3">
                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                    </div>
                    @endif
                    <div class="col-sm-5 mt-3">
                        <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- end -->
    </div>
    <!-- end cardbody -->
</div>
@endsection
