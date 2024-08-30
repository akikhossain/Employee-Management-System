@extends('admin.master')

@section('content')
<div class="container my-5 py-5">
    <h4 class="text-uppercase mb-4">My Provident Fund Details</h4>

    @if ($employee)
    <div class="card shadow">
        <div class="card-body">
            <p><strong>Employee Name:</strong> {{ $employee->name }}</p>
            <p><strong>Designation:</strong> {{ $employee->designation->designation_name }}</p>
            <p><strong>Department:</strong> {{ $employee->department->department_name }}</p>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Total Payable (BDT)</th>
                        <th>Provident Fund (BDT)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($providentFunds as $pf)
                    <tr>
                        <td>{{ $pf['month'] }}</td>
                        <td>{{ $pf['year'] }}</td>
                        <td>{{ number_format($pf['total_payable'], 2) }} BDT</td>
                        <td>{{ number_format($pf['provident_fund'], 2) }} BDT</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total Provident Fund</strong></td>
                        <td><strong>{{ number_format($totalProvidentFund, 2) }} BDT</strong></td>
                    </tr>
                </tbody>
            </table>

            <p class="text-muted mt-3">
                Note: The Provident Fund is only applicable after 6 months of your hire date.
            </p>
        </div>
    </div>
    @else
    <div class="alert alert-danger">
        No Provident Fund details found.
    </div>
    @endif
</div>
@endsection