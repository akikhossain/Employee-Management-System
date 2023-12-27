@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Attendance Record</h4>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center  bg-white">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                {{-- <th>D Name</th> --}}
                <th>Duration</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Late</th>
                <th>Check Out</th>
                <th>Overtime</th>
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
                <td>{{ $attendance->name }}</td>
                {{-- <td>{{ $attendance->employee->department->department_name }}</td> --}}
                <td>
                    {{ sprintf('%02d:%02d:%02d', $attendance->duration_minutes / 60, $attendance->duration_minutes % 60,
                    0) }}
                </td>
                <td>{{ $attendance->select_date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->late }}</td>
                <td>{{ $attendance->check_out }}</td>
                <td>{{ $attendance->overtime }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-25 mx-auto">
        {{ $attendances->links() }}
    </div>
</div>
@endsection