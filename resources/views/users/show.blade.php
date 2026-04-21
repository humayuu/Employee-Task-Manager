@extends('layout')
@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">User Info</div>
                    <div class="ms-auto">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary px-3"><i class="bx bx-arrow-back"></i>
                            Back</a>
                    </div>
                </div>


                <div class="card radius-15">
                    <div class="card-body p-4">
                        <!-- Profile Header -->
                        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                            <img src="{{ $user->profile_photo_path == null ? asset('default_avatar.png') : Storage::url($user->profile_photo_path) }}"
                                alt="Profile Photo" class="rounded-circle border border-3 border-light shadow-sm"
                                width="100" height="100">
                            <div class="ms-4">
                                <h4 class="mb-0">{{ $user->name }}</h4>
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>

                        <!-- Details Grid -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-uppercase text-secondary small fw-bold">Role</label>
                                <div class="fs-6 fw-semibold text-dark">{{ Str::upper($user->role) }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-uppercase text-secondary fw-bold">Status</label>
                                <div>
                                    <span
                                        class="badge bg-{{ $user->status == 'Active' ? 'success' : 'secondary' }} rounded-pill px-3 fs-5">
                                        {{ Str::upper($user->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
