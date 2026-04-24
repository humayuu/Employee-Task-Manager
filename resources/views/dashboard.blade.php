@extends('layout');
@section('main')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    @if (Auth::user()->role == 'admin')
                        <div class="col-12 col-lg-4">
                            <div class="card radius-15 overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div>
                                            <p class="mb-0 font-weight-bold">Employee</p>
                                            <h2 class="mb-0">{{ $totalUsers }}</h2>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-lg-4">
                        <div class="card radius-15 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Total Task</p>
                                        <h2 class="mb-0">{{ $totalTask }}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card radius-15 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="mb-0 font-weight-bold">OverDue</p>
                                        <h2 class="mb-0">{{ $overDueTask }}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card radius-15 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Pending</p>
                                        <h2 class="mb-0">{{ $pendingTask }}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card radius-15 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Completed</p>
                                        <h2 class="mb-0">{{ $completeTask }}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card radius-15 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="mb-0 font-weight-bold">In Progress</p>
                                        <h2 class="mb-0">{{ $inProgressTask }}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->

            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
@endsection
