@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Create Payroll</h4>
    <div>
        <a href="{{ route('payroll.view') }}" class="btn btn-success p-2 text-lg rounded-pill"> View Payroll List</a>
    </div>
</div>
<div class="container my-5 py-5">
    <!--Section: Form Design Block-->
    <section>
        <div>
            <div class="w-75 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">Payroll Form</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('payroll.store') }}">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="employee">Select Employee</label>
                                        <select name="employee_id" class="form-control">
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="salary_structure">Select Salary
                                            Structure:</label>
                                        <select name="salary_structure_id" class="form-control">
                                            @foreach($salaryStructures as $structure)
                                            <option value="{{ $structure->id }}">{{ $structure->salary_class }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="total_hours">Total Hours:</label>
                                        <input type="number" name="total_hours" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="income_tax">Deduction</label>
                                        <select name="deduction" class="form-control">
                                            <option value="income_tax">Income Taxes</option>
                                            <option value="health_insurance">Health Insurance</option>
                                            <option value="child_support">Child support payments</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline">
                                <label class="form-label mt-2 fw-bold" for="salary_structure_id">Total Salary</label>
                                <select name="salary_structure_id" class="form-control">
                                    @foreach($salaryStructures as $structure)
                                    <option value="{{ $structure->id }}">
                                        {{ $structure->total_salary }}
                                        <!-- Display total salary here -->
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 w-25 mx-auto text-center">
                                <button type="submit" class="btn btn-success p-2 text-lg rounded-pill col-md-10">Create
                                    Payroll</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection