@extends('layout')
@section('main')
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">All Task</div>
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
                            <h4 class="mb-0">Task <span class="fs-3 fw-bold">{{ $tasks->total() }}</span></h4>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('task.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="bx bx-plus fs-5"></i> Create Task
                            </a>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Assign To</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as $task)
                                        <tr>
                                            <td>{{ ucfirst($task->title) }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->due_date }}</td>
                                            <td>{{ ucfirst($task->status) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('task.show', $task->id) }}"
                                                        class="btn btn-sm btn-info d-flex align-items-center justify-content-center"
                                                        style="width:38px; height:38px; border-radius:8px;"
                                                        aria-label="View User">
                                                        <i class="bx bx-task fs-5"></i>
                                                    </a>

                                                    <a href="{{ route('task.edit', $task->id) }}"
                                                        class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                                        style="width:38px;height:38px;border-radius:8px">
                                                        <i class="bx bx-edit fs-5"></i>
                                                    </a>

                                                    <form method="POST" action="{{ route('task.destroy', $task->id) }}"
                                                        class="m-0">
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
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-danger mb-0">No Task Found!</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
