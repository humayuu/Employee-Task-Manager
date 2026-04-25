@extends('layout')
@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Edit Task</div>
                    <div class="ms-auto">
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
                        <ul class="list-group">
                            <li class="list-group-item">Title : <span>{{ $task->title }}</span></li>
                            <li class="list-group-item">Description : <span>{{ $task->description }}</span></li>
                            <li class="list-group-item">Due Date : <span>{{ $task->due_date }}</span></li>
                            <li class="list-group-item">Status: <span>{{ $task->status }}</span></li>
                        </ul>
                        @if ($task->status !== 'complete')
                            <form action="{{ route('user.task.update', $task->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-md-4 mb-3">
                                        <label for="status" class="form-label fs-4">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status">
                                            <option value="in_progress">in_progress</option>
                                            <option value="complete">complete</option>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3 border-top pt-3">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                    <a href="{{ url()->previous() }}" class="btn px-5">Cancel</a>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
