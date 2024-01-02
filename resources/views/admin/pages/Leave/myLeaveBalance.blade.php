{{-- @extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">My Leave Balance</h4>
</div>
<div class="my-5 py-5">
    <table class="table align-middle mb-5 text-center w-75 mx-auto bg-white">
        <thead class="bg-light">
            <tr>
                <th>Leave Type</th>
                <th>Total Days</th>
                <th>Taken Days</th>
                <th>Available Days</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveTypeBalances as $balance)
            <tr>
                <td>{{ $balance['leaveType'] }}</td>
                <td>{{ $balance['totalDays'] }}</td>
                <td>{{ $balance['takenDays'] }}</td>
                <td>{{ $balance['availableDays'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($totalTakenDays <= 25) <div class="text-center bg-success rounded-pill w-50 mx-auto p-1 pt-3 fs-5">
        <p>Total taken days: <span class="fw-bold text-danger">{{ $totalTakenDays }}</span>. You can take a total of 25
            Days Leave in a Year.</p>
</div>
@else
<div class="text-center fw-bold text-white bg-danger rounded-pill w-50 mx-auto p-1 mt-2 fs-5">
    <p>You have already taken more than 25 days of leave. You cannot apply for more leave.</p>
</div>
@endif
</div>
@endsection --}}



@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">My Leave Balance</h4>
</div>
<div class="my-5 py-5">


    <!-- Table displaying leave types and their days -->
    <table class="table align-middle mb-5 text-center w-75 mx-auto bg-white">
        <thead class="bg-light">
            <tr>
                <th>Leave Type</th>
                <th>Total Days</th>
                <th>Taken Days</th>
                <th>Available Days</th>
                <!-- Add other relevant headers -->
            </tr>
        </thead>
        <tbody>
            <!-- Loop through and display leave types -->
            @foreach($leaveTypeBalances as $leaveType => $balance)
            @if ($leaveType !== $designation)
            <tr>
                <td>{{ $leaveType }}</td>
                <td>{{ $balance['totalDays'] }}</td>
                <td>{{ $balance['takenDays'] }}</td>
                <td>{{ $balance['availableDays'] }}</td>
                <!-- Add other relevant data cells -->
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    <!-- Designation-based message -->
    @if($designation === 'android developer')
    <div class="text-center bg-success rounded-pill w-50 mx-auto p-1 pt-3 fs-5">
        <p>Total taken days: <span class="fw-bold text-danger">{{ $totalTakenDays }}</span>. You can take Total
            <span class="fw-bold text-primary">{{ $designationLeaveDays[$designation] }}</span> Days Leave In a Year.
        </p>
    </div>
    @elseif($designation === 'Software Engineer ')
    <div class="text-center bg-success rounded-pill w-50 mx-auto p-1 pt-3 fs-5">
        <p>Total taken days: <span class="fw-bold text-danger">{{ $totalTakenDays }}</span>. You can take Total
            <span class="fw-bold text-primary">{{ $designationLeaveDays[$designation] }}</span> Days Leave In a Year.
        </p>
    </div>
    <!-- Add conditions for other designations -->
    @elseif($designation === 'Web Developer')
    <div class="text-center bg-success rounded-pill w-50 mx-auto p-1 pt-3 fs-5">
        <p>Total taken days: <span class="fw-bold text-danger">{{ $totalTakenDays }}</span>. You can take Total
            <span class="fw-bold text-primary">{{ $designationLeaveDays[$designation] }}</span> Days Leave In a Year.
        </p>
    </div>
    @endif

</div>
@endsection