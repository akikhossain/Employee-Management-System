@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Payroll List</h4>
    <div>
        <a href="{{ route('payroll.create') }}" class="btn btn-success p-2 text-lg rounded-pill">Create New Payroll</a>
    </div>
</div>
<div class="  my-5 py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="input-group rounded w-50">
            <form action="{{ route('searchAllPayroll') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button type="submit" class="input-group-text border-0 bg-transparent" id="search-addon">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <a href="{{ route('allPayrollList') }}" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark">Report</a>
    </div>

    <div class="table-responsive">

        <table class="table align-middle text-center w-100   table-hover bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Dept</th>
                    <th>desig</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Salary Type</th>
                    <th>Salary</th>
                    <th>Deduction</th>
                    <th>Reason</th>
                    <th>Net Pay</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee->name }}</td>
                    <td>{{ $payroll->date }}</td>
                    <td>{{ $payroll->employee->department->department_name }}</td>
                    <td>{{ $payroll->employee->designation->designation_name }}</td>
                    <td>{{ $payroll->month }}</td>
                    <td>{{ $payroll->year }}</td>
                    <td>{{ $payroll->salaryStructure->salary_class }}</td>
                    <td>{{ $payroll->salaryStructure->total_salary }}</td>
                    <td>{{ $payroll->deduction }}</td>
                    <td>{{ $payroll->reason }}</td>
                    <td>{{ $payroll->total_payable }}</td>
                    <td>
                        <a class="btn btn-success rounded-pill"
                            href="{{ route('singlePayroll', $payroll->employee_id) }}"><i
                                class="fa-regular fa-file-lines"></i></a>

                        <a class="btn btn-warning rounded-pill" href="{{ route('payrollEdit', $payroll->id) }}"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger rounded-pill" href="{{ route('payrollDelete', $payroll->id) }}"><i
                                class="fa-solid fa-trash"></i></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-25 mx-auto">
        {{-- {{ $salaries->links() }} --}}
    </div>
</div>
@endsection