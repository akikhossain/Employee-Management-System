@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Add Employee</h4>
        <div>
            <a href="{{ route('manageEmployee.ViewEmployee') }}" class="btn btn-info p-2 text-lg rounded">Employee List</a>
        </div>
    </div>
    <div class="container my-5 py-5">

        <!--Section: Form Design Block-->
        <section>

            <div>
                <div class="w-75 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-font text-uppercase">Submit Employee Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manageEmployee.addEmployee.store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Employee Name</label>
                                            <input required type="text" id="form11Example1" name="name"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Employee ID</label>
                                            <input required type="text" id="form11Example1" name="employee_id"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example3">Password</label>
                                            <input required type="password" id="form11Example3" name="password"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example4">Designation</label>
                                            <input required type="text" id="form11Example4" name="designation"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('designation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example5">Email</label>
                                            <input required type="email" id="form11Example5" name="email"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example6">Phone</label>
                                            <input required type="number" id="form11Example6" name="phone"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example6">Salary</label>
                                            <input required type="number" id="form11Example6" name="salary"
                                                class="form-control" pattern="[0-9]+" />
                                        </div>
                                        <div class="mt-2">
                                            @error('salary')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example7">Location</label>
                                            <input required type="text" id="form11Example6" name="location"
                                                class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('location')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-info p-3 text-lg  rounded col-md-10">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
