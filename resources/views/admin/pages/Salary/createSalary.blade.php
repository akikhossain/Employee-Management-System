@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Create Salary</h4>
    <div>
        <a href="{{ route('salary.view') }}" class="btn btn-success p-2 text-lg rounded-pill"> View Salary List</a>

    </div>
</div>
<div class="container my-5 py-5">
    <!--Section: Form Design Block-->
    <section>
        <div>
            <div class="w-75 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">Salary Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('salary.store.data') }}" method="post" id="salaryForm">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="salaryClass">Salary Class</label>
                                        <select required id="salaryClass" name="salary_class" class="form-control"
                                            onchange="setSalaryValues()">
                                            <option value="">Select Salary Class</option>
                                            <option value="Entry Level">Entry Level</option>
                                            <option value="Mid Level">Mid Level</option>
                                            <option value="Senior Level">Senior Level</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        @error('salary_class')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="basicSalary">Basic Salary</label>
                                        <input required placeholder="Basic Salary" type="number" id="basicSalary"
                                            name="basic_salary" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        @error('basic_salary')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="medicalExpenses">Medical
                                            Expenses</label>
                                        <input required placeholder="Enter Amount" type="number" id="medicalExpenses"
                                            name="medical_expenses" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('medical_expenses')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="mobileAllowance">Mobile
                                            Allowance</label>
                                        <input required placeholder="Mobile Allowance" type="number"
                                            id="mobileAllowance" name="mobile_allowance" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('mobile_allowance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto mt-3">
                                <button type="submit" class="btn btn-success p-2 text-lg rounded-pill col-md-10">Create
                                    Salary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function setSalaryValues() {
        const salaryClass = document.getElementById('salaryClass').value;
        const basicSalaryInput = document.getElementById('basicSalary');
        const medicalExpensesInput = document.getElementById('medicalExpenses');
        const mobileAllowanceInput = document.getElementById('mobileAllowance');

        if (salaryClass === 'Entry Level') {
            basicSalaryInput.value = '3000';
            medicalExpensesInput.value = '100';
            mobileAllowanceInput.value = '50';
        } else if (salaryClass === 'Mid Level') {
            basicSalaryInput.value = '5000';
            medicalExpensesInput.value = '150';
            mobileAllowanceInput.value = '75';
        } else if (salaryClass === 'Senior Level') {
            basicSalaryInput.value = '8000';
            medicalExpensesInput.value = '200';
            mobileAllowanceInput.value = '100';
        }
    }
</script>

@endsection