@extends('auth.layout.master')

@section('title', 'Register')

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

        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

        <div class="p-3">
            <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="input-password" value="{{ old('password') }}" placeholder="Password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="confirm-input-password" data-parsley-equalto="#input-password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
                        @error('password_confirmation')
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
                            <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center row mt-3 pt-1">
                    <div class="col-12">
                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>

                <div class="form-group mt-2 mb-0 row">
                    <div class="col-12 mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                    </div>
                </div>
            </form>
            <!-- end form -->
        </div>
    </div>
    <!-- end cardbody -->
</div>
@endsection
