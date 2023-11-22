@extends('admin.master')
@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Create Leave</h4>
        <div>
            <a href="{{ route('leave.myLeave') }}" class="btn btn-info p-2 text-lg rounded">View Leave Status</a>
        </div>
    </div>
    <div class="container my-5 py-5">

        <!--Section: Form Design Block-->
        <section>

            <div>
                <div class="w-75 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-font text-uppercase">Leave Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('leave.store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Employee
                                                Name</label>
                                            <input required placeholder="Employee Name" type="text" id="form11Example1"
                                                name="employee_name" class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Department</label>
                                            <input required placeholder="Department" type="text" id="form11Example1"
                                                name="department" class="form-control">
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
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">From Date</label>
                                            <input required placeholder="Select" type="date" id="form11Example1"
                                                name="from_date" class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">To Date</label>
                                            <input required placeholder="Select" type="date" id="form11Example1"
                                                name="to_date" class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Employee ID</label>
                                            <input required placeholder="Employee ID" type="text" id="form11Example1"
                                                name="employee_id" class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Leave Type</label>
                                            <select required placeholder="Employee ID" type="text" id="form11Example1"
                                                name="leave_type" class="form-control">
                                                <option value="annual">Annual Leave</option>
                                                <option value="sick">Sick Leave</option>
                                                <option value="parent">Parent Leave</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label mt-2 fw-bold " for="form11Example1">Description</label><br>
                                    <textarea name="description" required placeholder="Write Your Reason Here..." type="text" id="form11Example1"
                                        class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="text-center w-25 mx-auto mt-3">
                                    <button type="submit"
                                        class="btn btn-info p-2 text-lg  rounded col-md-10">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
