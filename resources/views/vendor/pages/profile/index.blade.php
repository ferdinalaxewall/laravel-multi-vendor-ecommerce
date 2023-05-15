@extends('vendor.layouts.master')

@section('title', 'Profile')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center gap-3">
                    <img src="{{ $user->photo ? asset('storage/user/'.auth()->user()->photo) : asset('global/img/default-avatar.png') }}" alt="" id="profile-photo" class="avatar-lg rounded-circle img-thumbnail">
                    <h3 class="font-size-20 mb-1 fw-bolder">{{ $user->name }}</h3>
                    <div class="d-flex flex-column mb-1 font-size-16">
                        <span class="text-muted fw-bold">{{ $user->username ?? "-" }}</span>
                        <span class="text-muted">{{ $user->address ?? "-" }}</span>
                    </div>
                    <span class="text-muted">Since {{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}</span>
                    <div class="d-flex align-items-center gap-2">
                        <a href="#" class="btn btn-info">Follow</a>
                        <a href="#" class="btn btn-outline-info">Message</a>
                    </div>
                </div>                                            
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-8 col-md-7 col-sm-12 row pe-0">
        <div class="col-12 pe-0">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title font-size-20 fw-bolder mb-4 d-inline-flex align-items-center gap-2"><i class="ri-account-circle-fill"></i> Profile Account</h3>
                    <form action="{{ route('vendor.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label required">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" disabled>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="full-name" class="form-label required">Shop Name</label>
                            <input type="text" name="name" id="full-name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Vendor Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label required">Vendor Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" required>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label required">Vendor Address</label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ $user->address }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="vendor-info" class="form-label required">Vendor Info</label>
                            <textarea name="vendor_short_info" id="vendor-info" class="form-control @error('vendor_short_info') is-invalid @enderror" rows="3" required>{{ $user->vendor_short_info }}</textarea>
                            @error('vendor_short_info')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label required">Profile Picture</label>
                            <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                            @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-info">Save Changes</button>
                        </div>
                    </form>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-12 pe-0">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title font-size-20 fw-bolder mb-4 d-inline-flex align-items-center gap-2"><i class="ri-key-2-fill"></i> Change Password</h3>
                    <form action="{{ route('vendor.change-password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current-password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter your current password" required>
                            @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new-password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Enter your new password" required>
                            @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm-password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Enter your new password" required>
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-info">Save Changes</button>
                        </div>
                    </form>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
</div><!-- end row -->

@endsection

@push('script')
<script>
    (function(){
        // Change Preview Image in Profile Photo
        const inputPhoto = document.getElementById('photo');
        const profilePhoto = document.getElementById('profile-photo');

        inputPhoto.addEventListener('change', (event) => {
            const input = event.target;
            const file = input.files[0];
            if(file){
                const sourceUrl = URL.createObjectURL(file);
                console.log(sourceUrl);
                profilePhoto.setAttribute('src', sourceUrl);
            }
        })
    })()
</script>
@endpush