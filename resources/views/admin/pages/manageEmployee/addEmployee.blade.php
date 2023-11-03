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
                                            <input type="text" id="form11Example1" name="name" class="form-control" />
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Employee ID</label>
                                            <input type="text" id="form11Example1" name="employee_id"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example3">Password</label>
                                            <input type="password" id="form11Example3" name="password"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example4">Designation</label>
                                            <input type="text" id="form11Example4" name="designation"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example5">Email</label>
                                            <input type="email" id="form11Example5" name="email" class="form-control" />
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example6">Phone</label>
                                            <input type="number" id="form11Example6" name="phone" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example6">Salary</label>
                                            <input type="number" id="form11Example6" name="salary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-2" for="form11Example7">Location</label>
                                            <input type="text" id="form11Example6" name="location"
                                                class="form-control" />
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
