{{-- @extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">User Information</h4>
    <div>
        <a href="{{ route('users.create', ['employeeId' => $employee->id]) }}"
            class="btn btn-info p-2 text-lg rounded">Create new User</a>


    </div>
</div>
<section class="py-5 mt-5 my-auto" style="background-color: #f4f5f7;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0 p-3">
                <div class="card mb-3 gap-3 p-2" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-black">
                            <img src="{{ url('/uploads//' . $user->image) }}" alt="Avatar"
                                class="img-fluid my-5 mx-auto rounded-circle" style="width: 150px;" />
                            <h5>{{ $user->name }}</h5>
                            <p>{{ $user->role }}</p>
                            <a href=""><i class="far fa-edit mb-5"></i></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Department</h6>
                                        <p class="text-muted"> {{ $user->employee->department }}</p>
                                    </div>
                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Designation</h6>
                                        <p class="text-muted">{{ $user->employee->designation }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Location</h6>
                                        <p class="text-muted">{{ $user->employee->location }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}


@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">User Information</h4>
</div>
<section class="py-5 mt-5 my-auto" style="background-color: #f4f5f7;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0 p-3">
                <div class="card mb-3 gap-3 p-2" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-black">
                            <img src="{{ url('/uploads//' . $user->image) }}" alt="Avatar"
                                class="img-fluid my-5 mx-auto rounded-circle" style="width: 150px;" />
                            <h5>{{ $user->name }}</h5>
                            <p>{{ $user->role }}</p>
                            <a href=""><i class="far fa-edit mb-5"></i></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Role</h6>
                                        <p class="text-muted">{{ $user->role }}</p>
                                    </div>
                                    @if ($employee)
                                    <div class="col-6 mb-3">
                                        <h6>Department</h6>
                                        <p class="text-muted">{{ $employee->department }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Designation</h6>
                                        <p class="text-muted">{{ $employee->designation }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Location</h6>
                                        <p class="text-muted">{{ $employee->location }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{ $employee->phone }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Employee ID</h6>
                                        <p class="text-muted">{{ $employee->employee_id }}</p>
                                    </div>
                                    @endif
                                </div>
                                <!-- Additional fields as needed -->
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection