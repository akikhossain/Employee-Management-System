@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">My Leave</h4>
        <div>
            <a href="{{ route('leave.leaveForm') }}" class="btn btn-info p-2 text-lg rounded">Create Leave</a>
        </div>
    </div>
    <div class="  my-5 py-5">
        <table class="table align-middle text-center w-100 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Status</th>
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
                        <td>{{ $leave->employee_name }}</td>
                        <td>{{ $leave->department }}</td>
                        <td>{{ $leave->employee_id }}</td>
                        <td>{{ $leave->leave_type }}</td>
                        <td>{{ $leave->from_date }}</td>
                        <td>{{ $leave->to_date }}</td>
                        <td>{{ $leave->description }}</td>
                        <td>
                            <a class="btn btn-success" href="">Accept</a>
                            <a class="btn btn-danger" href="">Reject</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-25 mx-auto mt-4">
        </div>
    </div>
@endsection
