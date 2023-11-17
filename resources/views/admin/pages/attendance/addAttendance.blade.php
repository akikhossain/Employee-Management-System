@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Attendance Form</h4>
        <div>
            <a href="{{ route('attendance.viewAttendance') }}" class="btn btn-info p-2 text-lg rounded">Attendance List</a>
        </div>
    </div>
    <div class="container my-5 py-5">

        <!--Section: Form Design Block-->
        <section>
            <div>
                <div class="w-75 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-font text-uppercase">Submit Employee Attendance</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('addAttendance.store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class=" col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold" for="form11Example1">Employee
                                                Name</label>
                                            <select class="form-control" name="employee_name" id="" required>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class=" col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold" for="form11Example1">Employee ID</label>
                                            <select class="form-control" name="employee_id" id="" required>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->employee_id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold" for="form11Example1">Designation</label>
                                            <select class="form-control" name="designation" id="" required>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- date input --}}
                                <div class="form-outline mb-4">
                                    <label class="form-label mt-2 fw-bold" for="form11Example1">Select Date</label>
                                    <input required type="date" id="form11Example1" name="select_date"
                                        class="form-control" />
                                </div>

                                <!-- In Time input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label mt-2 fw-bold" for="form11Example1">Sign IN Time</label>
                                    <input required type="time" id="form11Example1" name="sign_in"
                                        class="form-control" />
                                </div>

                                <!-- Out Time input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label mt-2 fw-bold" for="form11Example1">Sign Out Time</label>
                                    <input required type="time" id="form11Example1" name="sign_out"
                                        class="form-control" />
                                </div>

                                {{-- total hours --}}
                                <div class="form-outline mb-4">
                                    <label class="form-label mt-2 fw-bold" for="form11Example1">Hours</label>
                                    <input required type="number" id="form11Example1" name="hours"
                                        class="form-control" />
                                </div>

                                {{-- <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-2">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form11Example8"
                                        checked />
                                    <label class="form-check-label" for="form11Example8">
                                        Create an account?
                                    </label>
                                </div> --}}
                                <div class="text-center w-25 mx-auto">
                                    <button type="submit"
                                        class="btn btn-info p-2 text-lg fw-bold rounded col-md-10">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
