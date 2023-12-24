@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Payroll List</h4>
    <div>
        <a href="{{ route('payroll.create') }}" class="btn btn-success p-2 text-lg rounded-pill">Create New Salary</a>
    </div>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center bg-white">
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
                    <a class="btn btn-success rounded-pill" href="">Pay</a>
                    <a class="btn btn-warning rounded-pill" href="">Edit</a>
                    <a class="btn btn-danger rounded-pill" href="">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="w-25 mx-auto">
        {{-- {{ $salaries->links() }} --}}
    </div>
</div>
@endsection