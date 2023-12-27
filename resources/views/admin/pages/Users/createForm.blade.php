@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Create User Account</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>

        <div>
            <div class="w-75 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">User Account Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">


                            @if (session()->has('myError'))
                            <p class="alert alert-danger">{{ session()->get('myError') }}</p>
                            @endif

                            @if (session()->has('message'))
                            <p class="alert alert-success">{{ session()->get('message') }}</p>
                            @endif


                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Enter User
                                            Name:</label>
                                        <input placeholder="Employee Name" type="text" id="form11Example1" name="name"
                                            class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Select
                                            Role:</label>
                                        <select required type="text" id="form11Example1" name="role"
                                            class="form-control">
                                            <option value="manager">Manager</option>
                                            <option value="employee">Employee/Staff</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <!-- ... existing form fields ... -->
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Enter User
                                            Email</label>
                                        <input required placeholder="Enter Email" type="email" id="form11Example1"
                                            name="email" class="form-control"
                                            value="{{ old('email') ?? ($employee ? $employee->email : '') }}" />

                                    </div>
                                    <div class="mt-2">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Enter
                                            Password:</label>
                                        <input required placeholder="Select" type="password" id="form11Example1"
                                            name="password" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Image</label>
                                        <input type="file" id="form11Example1" name="user_image" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto mt-3">
                                <button type="submit"
                                    class="btn btn-success p-2 text-lg  rounded col-md-10">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection