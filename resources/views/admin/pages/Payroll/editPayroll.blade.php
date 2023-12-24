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
                        <form method="post" action="{{ route('payrollUpdate', $payroll->id) }}">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="employee">Select Employee</label>
                                        <select name="employee_id" class="form-control" id="employeeSelect">
                                            <option value="">Select an Employee</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $payroll->employee_id ==
                                                $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="salary_structure">Select Salary
                                            Structure:</label>
                                        <select name="salary_structure_id" class="form-control"
                                            id="salaryStructureSelect">
                                            @foreach ($salaryStructures as $structure)
                                            <option value="{{ $structure->id }}"
                                                data-total-salary="{{ $structure->total_salary }}">
                                                {{ $structure->salary_class }} - ${{ $structure->total_salary }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="income_tax">Select Year</label>
                                        <select name="year" class="form-control">
                                            @php
                                            $currentYear = now()->year;
                                            @endphp
                                            @for ($year = $currentYear; $year <= $currentYear + 1; $year++) <option
                                                value="{{ $year }}" {{ $payroll->year == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                                </option>
                                                @endfor
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="income_tax">Select Month</label>
                                        <select name="month" class="form-control">
                                            @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July',
                                            'August', 'September', 'October', 'November', 'December'] as $month)
                                            <option value="{{ strtolower($month) }}" {{ strtolower($payroll->month) ==
                                                strtolower($month) ? 'selected' : '' }}>
                                                {{ $month }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="total_salary">Total Salary</label>
                                        <input type="number" id="total_salary" name="total_salary" class="form-control"
                                            value="{{ $payroll->total_salary }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="deduction">Deduction</label>
                                        <input required name="deduction" type="number" class="form-control"
                                            value="{{ $payroll->deduction }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold" for="reason">Reason of Deduction</label>
                                        <input name="reason" type="text" class="form-control"
                                            value="{{ $payroll->reason }}">
                                    </div>
                                </div>

                                <!-- Add these fields in your form -->
                                {{-- <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold" for="total_duration_hours">Total
                                                Duration (hours)</label>
                                            <input name="total_duration_hours" type="text" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold" for="total_overtime_hours">Total
                                                Overtime (hours)</label>
                                            <input name="total_overtime_hours" type="text" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div> --}}


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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
            var employeeSelect = document.querySelector('#employeeSelect');
            var totalDurationInput = document.querySelector('input[name="total_duration_hours"]');
            var totalOvertimeInput = document.querySelector('input[name="total_overtime_hours"]');

            // Updated event listener
            employeeSelect.addEventListener('change', function () {
                var selectedOption = this.options[this.selectedIndex];
                var totalDuration = selectedOption.getAttribute('data-duration') || '0';
                var totalOvertime = selectedOption.getAttribute('data-overtime') || '0';

                totalDurationInput.value = totalDuration;
                totalOvertimeInput.value = totalOvertime;
            });

            // Trigger change event on page load to display initial values
            employeeSelect.dispatchEvent(new Event('change'));
        });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const salaryStructureSelect = document.querySelector('#salaryStructureSelect');

            salaryStructureSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const totalSalary = selectedOption.getAttribute('data-total-salary') || '0';
                document.querySelector('#total_salary').value = totalSalary;
            });

            // Trigger change event on page load to set initial value
            salaryStructureSelect.dispatchEvent(new Event('change'));
        });
</script>

@endsection