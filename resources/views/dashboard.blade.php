@extends('layout')
@section('main')
    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head d-flex align-items-center mb-sm-4 mb-3">
                <div class="mr-auto">
                    <h2 class="text-black font-w600">Dashboard</h2>
                    <p class="mb-0">Hospital Admin Overview</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body mr-3">
                                    {{-- Dynamic Count --}}
                                    <h2 class="fs-34 text-black font-w600">{{ $totalAppointments ?? 0 }}</h2>
                                    <span>Appointments</span>
                                </div>
                                <svg width="40" height="40" viewBox="0 0 40 40">...</svg>
                            </div>
                        </div>
                        <div class="progress rounded-0" style="height:4px;">
                            <div class="progress-bar rounded-0 bg-secondary progress-animated"
                                style="width: 50%; height:4px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body mr-3">
                                    <h2 class="fs-34 text-black font-w600">{{ number_format($totalPatients ?? 0) }}</h2>
                                    <span>Total Patients</span>
                                </div>
                                <svg width="40" height="40" viewBox="0 0 40 40">...</svg>
                            </div>
                        </div>
                        <div class="progress rounded-0" style="height:4px;">
                            <div class="progress-bar rounded-0 bg-secondary progress-animated"
                                style="width: 90%; height:4px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body mr-3">
                                    <h2 class="fs-34 text-black font-w600">{{ $totalDoctors ?? 0 }}</h2>
                                    <span>Total Doctors</span>
                                </div>
                                <svg width="40" height="40" viewBox="0 0 40 40">...</svg>
                            </div>
                        </div>
                        <div class="progress rounded-0" style="height:4px;">
                            <div class="progress-bar rounded-0 bg-secondary progress-animated"
                                style="width: 30%; height:4px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body mr-3">
                                    <h2 class="fs-34 text-black font-w600">${{ number_format($totalEarnings ?? 0, 2) }}</h2>
                                    <span>Hospital Earnings</span>
                                </div>
                                <svg width="40" height="40" viewBox="0 0 40 40">...</svg>
                            </div>
                        </div>
                        <div class="progress rounded-0" style="height:4px;">
                            <div class="progress-bar rounded-0 bg-secondary progress-animated"
                                style="width: 94%; height:4px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
