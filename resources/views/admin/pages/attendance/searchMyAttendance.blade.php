@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Searched Record</h4>
</div>
<div class="container my-5 py-5">

    <div class="fw-normal mb-4">
        <h2 class="fw-normal fs-5 mx-auto text-center rounded-pill p-2 w-50 mb-5
            @if ($attendances->count() > 0) bg-success
            @else
                bg-danger text-white @endif">
            @if ($attendances->count() === 1)
            Found 1 matching data for "{{ request()->search }}"
            @elseif ($attendances->count() > 1)
            Found {{ $attendances->count() }} matching data for "{{ request()->search }}"
            @else
            No Data found for "{{ request()->search }}"
            @endif
        </h2>
    </div>




    @if ($attendances->count() > 0)
    <table class="table align-middle mb-4 text-center  bg-white">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Month</th>
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
                <td>{{ $attendance->month }}</td>
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
    @endif
    <div class="w-25 mx-auto">
        {{ $attendances->links() }}
    </div>
</div>
@endsection