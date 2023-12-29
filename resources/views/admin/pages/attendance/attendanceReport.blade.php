@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">Attendance Record</h4>
</div>
<div class="container my-5 py-5">


    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i class="fa-solid fa-print me-1"></i>Print</button>
    </div>
    <div id="printDiv">
        <div class="col-md-12 mt-5">
            <div class="text-center">
                <h4 class="pt-0">Employee Attendance Records</h4>
                <p class="pt-0"></p>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="card-header p-4">
                    <a class="pt-2 d-inline-block" href="" data-abc="true">HR HUB 360</a>
                    <div class="float-right">
                        <h3 class="mb-0">Employee Attendance Record</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead>
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
                                        {{ sprintf('%02d:%02d:%02d', $attendance->duration_minutes / 60,
                                        $attendance->duration_minutes % 60,
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
                    </div>
                </div>
                <div class="card-footer bg-dark-light p-1 rounded text-center mt-5">
                    <p class="mb-0">© 2023 Copyright: Employee Management System | Akik Hossain</p>
                </div>
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