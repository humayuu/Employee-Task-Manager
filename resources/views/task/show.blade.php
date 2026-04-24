@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- Breadcrumb & Action Header -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
                    <div class="breadcrumb-title pe-3 border-0 fw-bold fs-4">Task Details</div>
                    <div class="ms-auto">
                        <a href="{{ route('task.index') }}" class="btn btn-secondary  px-4">
                            <i class="bx bx-arrow-back"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card border-top border-0 border-4 border-primary radius-15">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bx-task me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Information Summary</h5>
                        </div>
                        <hr>

                        <div class="row g-3">
                            <!-- Task Title (Full Width) -->
                            <div class="col-12 mb-3">
                                <label class="form-label text-muted  uppercase">Task Title</label>
                                <div class="fs-4 fw-bold text-dark">{{ $task->title }}</div>
                            </div>

                            <!-- Assigned To -->
                            <div class="col-md-6">
                                <label class="form-label text-muted">Assigned To</label>
                                <div class="d-flex align-items-center">
                                    <div class="widgets-icons-2 rounded-circle bg-light-primary text-primary me-2">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="fw-bold">{{ $user->name }}</div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label text-muted">Current Status</label>
                                <div>
                                    <span
                                        class="badge rounded-pill bg-{{ $task->status == 'completed' ? 'success' : 'warning' }} px-3">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div class="col-md-6">
                                <label class="form-label text-muted">Created Date</label>
                                <div class="fw-normal"><i
                                        class="bx bx-calendar me-1"></i>{{ $task->created_at->format('M d, Y') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-muted">Due Date</label>
                                <div class="fw-bold text-danger"><i
                                        class="bx bx-calendar-exclamation me-1"></i>{{ $task->due_date }}</div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label text-muted ">Description</label>
                                <div class="bg-light p-3 radius-10 border">
                                    {{ $task->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
