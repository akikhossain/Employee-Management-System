@extends('admin.master')

@section('content')
    <div class="page-header">
        <h1 class="page-heading">dashboard</h1>
        <p class="fw-bold animated-text"> <span>Hello,</span>
            <span>Akik!!</span>
            <span>Welcome</span>
            <span>to</span>
            <span>HR</span>
            <span>Platform👋</span>
        </p>
        <span id='ct6' style="font-size: 30px"></span>
    </div>
    <section class="mb-3 mb-lg-5">
        <div class="row mb-3">
            <!-- Widget Type 1-->
            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-red">50</h4>
                                <p class="subtitle text-sm text-muted mb-0">Total Employee</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <div>
                                    <img class="img-fluid custom-small-img" src="https://i.ibb.co/z2mjFD8/teamwork-1.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('manageEmployee.ViewEmployee') }}">
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
            <!-- /Widget Type 1-->
            <!-- Widget Type 1-->
            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-blue">15</h4>
                                <p class="subtitle text-sm text-muted mb-0">Work Details</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <div>
                                    <img class="img-fluid custom-small-img" src="https://i.ibb.co/2tHwKBW/hard-work.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><a href="#"><i class="fas fa-caret-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widget Type 1-->
            <!-- Widget Type 1-->
            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-primary">3</h4>
                                <p class="subtitle text-sm text-muted mb-0">Pending Leave</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <div>
                                    <img class="img-fluid custom-small-img" src="https://i.ibb.co/wcZWNbF/arrow.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><a href="#"><i class="fas fa-caret-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widget Type 1-->

            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-green">5</h4>
                                <p class="subtitle text-sm text-muted mb-0">Pending Tour</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <div>
                                    <img class="img-fluid custom-small-img" src="https://i.ibb.co/j6mV9pD/destination.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-green">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><a href="#"><i class="fas fa-caret-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-info">$10,500</h4>
                                <p class="subtitle text-sm text-muted mb-0">Earnings</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <div>
                                    <img class="img-fluid custom-small-img" src="https://i.ibb.co/d540KYg/teamwork.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-info-light">
                        <div class="row align-items-center text-info">
                            <div class="col-10">
                                <p class="mb-0">View Details</p>
                            </div>
                            <div class="col-2 text-end"><a href="#"><i class="fas fa-caret-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
