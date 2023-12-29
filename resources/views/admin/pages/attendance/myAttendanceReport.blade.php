@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Attendance</h4>
</div>
<div class="container my-5 py-5">
    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i class="fa-solid fa-print me-1"></i>Print</button>
    </div>

    <div id="printDiv">
        <div class="col-md-12 mt-5">
            <div class="text-center">
                <h4 class="pt-0">Attendance Records</h4>
                <p class="pt-0"></p>
            </div>
        </div>
        <div class="card-header">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h3 class="text-dark mb-1">{{ auth()->user()->name }}</h3>
                    <div>Designation: {{ auth()->user()->employee->designation->designation_name }}</div>
                    <div>Department: {{ auth()->user()->employee->department->department_name }}</div>
                    <div>Email: {{ auth()->user()->employee->email }}</div>
                    <div>Phone: {{ auth()->user()->employee->phone }}</div>
                </div>
            </div>
            <table class="table align-middle text-center table-hover  bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
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
                        <td>{{ $attendance->month }}</td>
                        <td>
                            {{ sprintf('%02d:%02d:%02d', $attendance->duration_minutes / 60,
                            $attendance->duration_minutes % 60,
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
            <div class="card-footer p-2 mt-5 text-center rounded bg-dark-light">
                <p class="mb-0">© 2023 Copyright: Employee Management System | Akik Hossain</p>
            </div>
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