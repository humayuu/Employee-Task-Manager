@extends('layout')
@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Edit User</div>
                    <div class="ms-auto">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary px-3"><i class="bx bx-arrow-back"></i>
                            Back</a>
                    </div>
                </div>


                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="fullname" name="name" placeholder="Enter full name" autofocus
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="email@example.com"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select @error('role') is-invalid @enderror" id="role"
                                        name="role">
                                        <option disabled selected>Open to Select an option</option>
                                        <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee
                                        </option>
                                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager
                                        </option>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="mt-3 border-top pt-3">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                <button type="reset" class="btn px-5">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
