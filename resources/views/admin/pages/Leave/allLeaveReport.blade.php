@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">Leave Record</h4>
</div>
<div class="container my-5 py-5">


    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i class="fa-solid fa-print me-1"></i>Print</button>
    </div>
    <div id="printDiv">
        <div class="col-md-12 mt-5">
            <div class="text-center">
                <h4 class="pt-0">Leave Records</h4>
                <p class="pt-0"></p>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="card-header p-4">
                    <a class="pt-2 d-inline-block" href="" data-abc="true">HR HUB 360</a>
                    <div class="float-right">
                        <h3 class="mb-0">Leave Record</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Days</th>
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
                                    <td>{{ $leave->type->leave_type_id }}</td>
                                    <td>{{ $leave->from_date }}</td>
                                    <td>{{ $leave->to_date }}</td>
                                    <td>{{ $leave->total_days }}</td>
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