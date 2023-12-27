@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Leave</h4>
    <div>
        <a href="{{ route('leave.leaveForm') }}" class="btn btn-success p-2  px-3 text-lg rounded-pill">Apply for
            Leave</a>
    </div>
</div>
<div class="container my-5 py-5">
    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i
                class="fas fa-print text-primary me-2 text-white  rounded-pill"></i>Print</button>
    </div>

    <div id="printDiv">
        <div class="col-md-12 mt-5">
            <div class="text-center">
                <h4 class="pt-0">Leave Records</h4>
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
                        <td>{{ $leave->type->leave_type_id }}</td>
                        <td>{{ $leave->from_date }}</td>
                        <td>{{ $leave->to_date }}</td>
                        <td>{{ $leave->total_days }}</td>
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