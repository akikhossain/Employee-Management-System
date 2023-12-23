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
                        <form action="{{ route('manageEmployee.addEmployee.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class=" col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="form11Example1">Employee
                                            Name</label>
                                        <input required placeholder="Enter Name" type="text" id="form11Example1"
                                            name="name" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="form11Example1">Employee ID</label>
                                        <input required placeholder="Enter ID" type="text" id="form11Example1"
                                            name="employee_id" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('employee_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2" for="form11Example1">Deparment Name</label>
                                        <select type="text" class="form-control" name="department_id">
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{ $department->department_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('department_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example3">Date of
                                            Birth</label>
                                        <input required type="date" id="form11Example3" name="date_of_birth"
                                            class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('date_of_birth')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2" for="form11Example1">Designation</label>
                                        <select required class="form-control" name="designation_id">
                                            @foreach ($designations as $designation)
                                            <option value="{{$designation->id}}">{{ $designation->designation_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('designation_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example4">Hire Date</label>
                                        <input required placeholder="Enter date here" type="date" id="form11Example4"
                                            name="hire_date" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('hire_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example5">Email</label>
                                        <input required placeholder="Enter Email" type="email" id="form11Example5"
                                            name="email" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example6">Phone</label>
                                        <input required placeholder="Phone Number" type="number" id="form11Example6"
                                            name="phone" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example6">Image</label>
                                        <input type="file" id="form11Example6" name="employee_image"
                                            class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('employee_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2" for="form11Example1">Salary Grade</label>
                                        <select required class="form-control" name="salary_structure_id">
                                            @foreach ( $salaries as $salary)
                                            <option value="{{ $salary->id}}">{{ $salary->salary_class }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('salary_structure_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label mt-2 fw-bold" for="form11Example7">Location</label>
                                        <input required placeholder="Enter Location" type="text" id="form11Example6"
                                            name="location" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('location')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="joinMode">Mode of Joining</label>
                                        <select required id="joinMode" name="joining_mode" class="form-select">
                                            <option value="interview">Interview</option>
                                            <option value="referral">Referral</option>
                                            <option value="walk-in">Walk-in</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('joining_mode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto">
                                <button type="submit"
                                    class="btn btn-info p-2 text-lg rounded col-md-10 fw-bold">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection