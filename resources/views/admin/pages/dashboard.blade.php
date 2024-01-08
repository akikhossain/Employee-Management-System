@extends('admin.master')

@section('content')
<div class="page-header ">
    {{-- <h1 class="page-heading">dashboard</h1> --}}
    {{-- <span class="fw-bold page-heading" style="font-size: 30px">Today</span><br> --}}
    <span id="dayOfWeek" class="page-heading" style="font-size: 30px"></span><br>
    <span id='ct7' class="page-heading" style="font-size: 25px"></span>
    <p class="fw-medium fs-5 animated-text"> <span>Hello,</span>
        <span class="fw-bold ">{{ auth()->user()->name }}</span>
        <span>Welcome</span>
        <span>to</span>
        <span>HR</span>
        <span>Platform👋</span>
        <hr>
    </p>
</div>
<section class="mb-3 mb-lg-5">
    <div class="row mb-3">


        @admin

        {{-- Admin Only --}}


        <!-- Widget Type 1-->
        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-red">{{ $employees }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Total Employee</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/teamwork.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('manageEmployee.ViewEmployee') }}">
                    <div class="card-footer py-3 bg-red-light">
                        <div class="row align-items-center text-red">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-dark">{{ $totalTasks }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Assigned Task</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/task.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('taskList') }}">
                    <div class="card-footer py-3 bg-dark-light">
                        <div class="row align-items-center text-dark">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- /Widget Type 1-->
        <!-- Widget Type 1-->
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-blue">{{ $departments }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Department</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img"
                                    src="{{ asset('assests/image/department.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('organization.department') }}">
                    <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Widget Type 1-->
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-primary">{{ $pendingLeaves }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Leave Request</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/leave.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('leave.leaveStatus') }}">
                    <div class="card-footer py-3 bg-warning-light">
                        <div class="row align-items-center text-warning">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- /Widget Type 1-->

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-info">{{ $users }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">Users</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/users.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('users.list') }}">
                    <div class="card-footer py-3 bg-info-light">
                        <div class="row align-items-center text-info">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-success"></h4>
                            <p class="subtitle text-sm text-muted mb-0">Payrolls History</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/money.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('payroll.view') }}">
                    <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-green">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endadmin

        @employee
        {{-- Employee Only --}}
        {{-- my profile --}}
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-green"></h4>
                            <p class="subtitle text-sm text-muted mb-0">My Profile</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/profile.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('profile') }}">
                    <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-green">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- my payroll --}}
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-primary"></h4>
                            <p class="subtitle text-sm text-muted mb-0">My Payroll</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/exchange.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('myPayroll') }}">
                    <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-normal text-green">{{ $pendingLeaves }}</h4>
                            <p class="subtitle text-sm text-muted mb-0">My Leave</p>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <div>
                                <img class="img-fluid custom-small-img" src="{{ asset('assests/image/logout.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('leave.myLeave') }}">
                    <div class="card-footer py-3 bg-dark-light">
                        <div class="row align-items-center text-dark">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                            </div>
                        </div>
                    </div>
                </a>
                @endemployee
            </div>

            @endsection