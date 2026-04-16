@extends('layout')
@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">All Users</div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card radius-15">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Users <span class="fs-3 fw-bold">{{ $users->total() }}</span></h4>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="bx bx-user-plus fs-5"></i> Create User
                            </a>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>
                                                @if ($user->profile_photo_path)
                                                    <img width="100" src="{{ Storage::url($user->profile_photo_path) }}"
                                                        alt="User-Image">
                                                @else
                                                    <img width="100" src="{{ asset('default_avatar.png') }}"
                                                        alt="">
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-primary fs-5">{{ Str::upper($user->role) }}</td>
                                            <td class="text-primary fs-5">{{ Str::upper($user->status) }}</td>
                                            @if ($user->role == 'manager' || $user->role == 'employee')
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('user.status', $user->id) }}"
                                                            class="btn btn-sm btn-info d-flex align-items-center justify-content-center"
                                                            style="width:38px;height:38px;border-radius:8px">
                                                            <i class="bx bx-refresh fs-5"></i>
                                                        </a>

                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                                            style="width:38px;height:38px;border-radius:8px">
                                                            <i class="bx bx-edit fs-5"></i>
                                                        </a>

                                                        <form method="POST"
                                                            action="{{ route('user.destroy', $user->id) }}" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                                                style="width:38px;height:38px;border-radius:8px"
                                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                                <i class="bx bx-trash fs-5"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-danger mb-0">No Users Found!</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
