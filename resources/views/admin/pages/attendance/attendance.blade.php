@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Attendance</h4>
    </div>
    <div class="container my-5 py-5">
        <!--Section: Form Design Block-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 fs-5 text-center mb-2 p-2">
                    <p>Your presence counts. Each tick, a commitment. Every day, a step forward. Own your time, make each
                        mark matter, and watch your efforts shape success. Your journey starts now.</p>
                </div>
            </div>
        </div>
        <hr>
        <section class="v" style="background-color: #eee;">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-md-9 col-lg-7 col-xl-5">
                        <div class="card" style="border-radius: 15px; background-color: #93e2bb;">
                            <div class="card-body p-4 text-black">
                                <div>
                                    <h6 class="mb-4 text-center">Stamp Your Attendance</h6>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="small mb-0"><i class="far fa-clock me-2"></i>Schedule: 10AM - 6PM</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <div class="flex-shrink-0">
                                        <img src={{ auth()->user()->image }} alt="Generic placeholder image"
                                            class="img-fluid rounded-circle border border-dark border-3"
                                            style="width: 70px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div>
                                            <button type="button" class="btn btn-outline-dark btn-rounded btn-sm"
                                                data-mdb-ripple-color="dark">{{ auth()->user()->name }}</button><br>
                                            <button type="button" class="btn btn-outline-dark btn-rounded btn-sm mt-2"
                                                data-mdb-ripple-color="dark">{{ auth()->user()->role }}</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="my-4 pb-1 text-center">Give your today's attendance by clicking here👇</p>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-rounded btn-block btn-lg"><i
                                            class="far fa-clock me-2"></i>Start Your Day</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection