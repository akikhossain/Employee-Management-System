@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Leave</h4>
    <div>
        <a href="{{ route('leave.leaveForm') }}" class="btn btn-success p-2  px-3 text-lg rounded-pill">Apply for
            Leave</a>
    </div>
</div>
<div class="container my-5 py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="input-group rounded w-50">
            <form action="{{ route('employee.search') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button type="submit" class="input-group-text border-0 bg-transparent" id="search-addon">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <a href="{{ route('myLeaveReport') }}" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark">Report</a>
    </div>


    <table class="table align-middle text-center table-hover  bg-white">
        <thead class="bg-light">
            <tr>
                <th>SL NO</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Days</th>
                <th>Description</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $key => $leave)
            <tr>
                <td>
                    <div>
                        <p class="fw-bold mb-1">{{ $key + 1 }}</p>
                    </div>
                </td>
                <td>{{ $leave->type->leave_type_id }}</td>
                <td>{{ $leave->from_date }}</td>
                <td>{{ $leave->to_date }}</td>
                <td>{{ $leave->total_days }}</td>
                <td>{{ $leave->description }}</td>
                <td>
                    @if($leave->status === 'approved')
                    <span class="text-white fw-bold bg-green rounded-pill p-2">Accepted</span>
                    @elseif($leave->status === 'rejected')
                    <span class="text-white fw-bold bg-red rounded-pill p-2">Rejected</span>
                    @else
                    <span class="text-white fw-bold bg-warning rounded-pill p-2">Pending</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-25 mx-auto mt-4">
        {{ $leaves->links() }}
    </div>
</div>
@endsection