@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">View Attendance List</h4>
        <div>
            <a href="{{ route('attendance.addAttendance') }}" class="btn btn-info p-2 text-lg rounded">Add New Attendance</a>
        </div>
    </div>
    <div class="container my-5 py-5">
        <table class="table align-middle mb-4 text-center  bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Date</th>
                    <th>Sign In</th>
                    <th>Sign Out</th>
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
                            <p class="fw-normal mb-1">{{ $attendance->employee_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $attendance->designation }}</p>
                        </td>
                        <td>{{ $attendance->select_date }}</td>
                        <td>{{ $attendance->sign_in }}</td>
                        <td>{{ $attendance->sign_out }}</td>
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
