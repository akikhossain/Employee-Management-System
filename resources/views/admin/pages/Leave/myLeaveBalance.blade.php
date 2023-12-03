@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Leave Balance</h4>
</div>
<div class="my-5 py-5">
    <table class="table align-middle text-center w-75 mx-auto bg-white">
        <thead class="bg-light">
            <tr>
                <th>Leave Type</th>
                <th>Total Days</th>
                <th>Taken Days</th>
                <th>Available Days</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveTypeBalances as $leaveType => $balance)
            <tr>
                <td>{{ $leaveType }}</td>
                <td>{{ $balance['totalDays'] }}</td>
                <td>{{ $balance['takenDays'] }}</td>
                <td>{{ $balance['availableDays'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($totalTakenDays <= 25) <!-- Allow applying for leave -->
        <div class="text-center fw-bold text-white bg-success rounded-pill w-50 mx-auto p-2 mt-2 fs-5">
            <p>You can apply for leave. Total taken days: {{ $totalTakenDays }}</p>
            <!-- Your leave application form or button can be added here -->
        </div>
        @else
        <div class="class=" text-center fw-bold text-white bg-danger rounded-pill w-50 mx-auto p-2 mt-2 fs-5"">
            <!-- Display message if total taken days exceed the limit -->
            <p>You have already taken more than 25 days of leave. You cannot apply for more leave.</p>
        </div>
        @endif
</div>
@endsection