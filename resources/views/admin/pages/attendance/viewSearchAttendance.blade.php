@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Searched Attendance List</h4>
</div>
<div class="  my-5 py-5">

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

    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i class="fa-solid fa-print me-1"></i>Print</button>
    </div>

    <div id="printDiv">
        <div class="col-md-12 mt-5 mb-4">
            <div class="text-center">
                <h4 class="pt-0">Attendance Records</h4>
                <p class="pt-0"></p>
            </div>
        </div>
        <table class="table align-middle mb-4 text-center  bg-white">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>month</th>
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
                    <td>{{ $attendance->department_name }}</td>
                    <td>{{ $attendance->designation_name }}</td>
                    <td>
                        {{ sprintf('%02d:%02d:%02d', $attendance->duration_minutes / 60, $attendance->duration_minutes %
                        60,
                        0) }}
                    </td>
                    <td>{{ $attendance->select_date }}</td>
                    <td>{{ $attendance->month }}</td>
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
</div>
@endsection

@push('yourJsCode')

<script type="text/javascript">
    function printContent(el){
          var restorepage = $('body').html();
          var printcontent = $('#' + el).clone();
          $('body').empty().html(printcontent);
          window.print();
          $('body').html(restorepage);
      }
</script>
@endpush