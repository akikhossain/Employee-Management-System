@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">Searched Leave Request</h4>
</div>
<div class="my-5 py-5">


    <div class="fw-normal mb-4">
        <h2 class="fw-normal fs-5 mx-auto text-center rounded-pill p-2 w-50 mb-5
            @if ($leaves->count() > 0) bg-success
            @else
                bg-danger text-white @endif">
            @if ($leaves->count() === 1)
            Found 1 matching data for "{{ request()->search }}"
            @elseif ($leaves->count() > 1)
            Found {{ $leaves->count() }} matching data for "{{ request()->search }}"
            @else
            No Data found for "{{ request()->search }}"
            @endif
        </h2>
    </div>

    @if ($leaves->count() > 0)
    <table class="table align-middle text-center w-100 bg-white">
        <thead class="bg-light">
            <tr>
                <th>SL NO</th>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Days</th>
                <th>Description</th>
                <th>Actions</th>
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
                <td>{{ $leave->department_name }}</td>
                <td>{{ $leave->designation_name }}</td>
                <td>{{ $leave->type->leave_type_id }}</td>
                <td>{{ $leave->from_date }}</td>
                <td>{{ $leave->to_date }}</td>
                <td>{{ $leave->total_days }}</td> <!-- Display total_days -->
                <td>{{ $leave->description }}</td>
                <td>
                    @if ($leave->status == 'approved')
                    <span class="text-white fw-bold bg-green rounded-pill p-2">Approved</span>
                    @elseif ($leave->status == 'rejected')
                    <span class="text-white fw-bold bg-red rounded-pill p-2">Rejected</span>
                    @else
                    <a class="btn btn-success rounded-pill "
                        href="{{ route('leave.approve', ['id' => $leave->id]) }}">Approve</a>
                    <a class="btn btn-danger rounded-pill "
                        href="{{ route('leave.reject', ['id' => $leave->id]) }}">Reject</a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="w-25 mx-auto mt-4">
        {{ $leaves->links() }}
    </div>
</div>
@endsection