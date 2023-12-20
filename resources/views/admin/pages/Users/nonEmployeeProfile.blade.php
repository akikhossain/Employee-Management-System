{{-- @extends('admin.master')
@section('content')

<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Employee Profile</h4>
</div>
<section>
    <div class="container py-5">
        <div class="container">
            <h1>Welcome, {{ $user->name }}</h1>
            <p>Email: {{ $user->email }}</p> --}}
            <!-- Display other user details -->
            <!-- Other non-employee-related information -->
            {{-- @if($user->user_image)
            <img src="{{ url('/uploads//' . $user->user_image) }}" alt="User Image">
            @else --}}
            <!-- Default image for non-employees without a profile picture -->
            {{-- <img src="{{ asset('default-user-image.jpg') }}" alt="Default User Image">
            @endif
        </div>
    </div>
</section>
@endsection --}}


@extends('admin.master')
@section('content')

<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Profile</h4>
</div>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ url('/uploads//' . $user->user_image) }}" alt="User Image"
                            class="rounded-circle mx-auto img-fluid"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        <h5 class="my-3">{{ $user->name }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Role</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->role }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection