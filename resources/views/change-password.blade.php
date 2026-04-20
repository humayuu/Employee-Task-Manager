@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Change Password</div>
                    <div class="ms-auto">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary px-3">
                            <i class="bx bx-arrow-back"></i> Back
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.password.store', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        id="current_password" name="current_password"
                                        placeholder="Enter Your Current Password" autofocus>
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Enter Your New Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">Min 8 Characters</small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Enter Your Confirm Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3 border-top pt-3">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                <button type="reset" class="btn btn-outline-secondary px-5">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
