@extends('admin.master')

@section('content')
    <h4 class="shadow p-4 text-uppercase">Add Employee</h4>
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
                            <form action="{{ url('/manageEmployee/addEmployee/store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form11Example1" name="name" class="form-control" />
                                            <label class="form-label mt-2" for="form11Example1">Name</label>
                                        </div>
                                    </div>

                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form11Example3" name="password" class="form-control" />
                                    <label class="form-label mt-2" for="form11Example3">Password</label>
                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form11Example4" name="designation" class="form-control" />
                                    <label class="form-label mt-2" for="form11Example4">Designation</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form11Example5" name="email" class="form-control" />
                                    <label class="form-label mt-2" for="form11Example5">Email</label>
                                </div>

                                <!-- Number input -->
                                <div class="form-outline mb-4">
                                    <input type="number" id="form11Example6" name="phone" class="form-control" />
                                    <label class="form-label mt-2" for="form11Example6">Phone</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="number" id="form11Example6" name="salary" class="form-control" />
                                    <label class="form-label mt-2" for="form11Example6">Salary</label>
                                </div>

                                <!-- Message input -->
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="form11Example7" name="additional_information" rows="4"></textarea>
                                    <label class="form-label mt-2" for="form11Example7">Additional information</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-2">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form11Example8"
                                        checked />
                                    <label class="form-check-label" for="form11Example8">
                                        Create an account?
                                    </label>
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
