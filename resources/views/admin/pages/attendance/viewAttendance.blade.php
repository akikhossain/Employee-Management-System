@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">View Attendance List</h4>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center  bg-white">
        <thead class="bg-light">
            <tr>
                <th>SL NO</th>
                <th>Employee Name</th>
                <th>Employee ID</th>
                <th>Department</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $key => $attendance)
            <tr>
                <td>
                    <div>
                        <p class="fw-bold mb-1">{{ $key + 1 }}</p>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{ $attendance->name }}</p>
                </td>
                <td>{{ $attendance->employee_id }}</td>
                <td>
                    <p class="fw-normal mb-1">{{ $attendance->department }}</p>
                </td>
                <td>{{ $attendance->select_date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
                <td>
                    <a class="btn btn-success" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-25 mx-auto ">
        {{ $attendances->links() }}
    </div>
</div>
@endsection