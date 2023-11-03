@extends('admin.master')

@section('content')
    <div class="page-header">
        <h1 class="page-heading">dashboard</h1>
        <p class="fw-bold">Hello, Akik!! Welcome to HR Platform👋 </p>
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
                                <svg class="svg-icon text-red">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#speed-1"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('/manageEmployee/viewEmployee') }}">
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
                                <svg class="svg-icon text-blue">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#news-1"> </use>
                                </svg>
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
                                <svg class="svg-icon text-primary">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#bookmark-1"> </use>
                                </svg>
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

            <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-normal text-green">5</h4>
                                <p class="subtitle text-sm text-muted mb-0">Pending Tour</p>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-green">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#world-map-1"> </use>
                                </svg>
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
                                <svg class="svg-icon text-info">
                                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#speed-1"> </use>
                                </svg>
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
