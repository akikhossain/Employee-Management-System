@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">All Payroll List</h4>
</div>
<div class="container my-5 py-5">
    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i
                class="fas fa-print text-primary me-2 text-white  rounded-pill"></i>Print</button>
    </div>

    <div class="col-md-12 mt-5">
        <div class="text-center">
            <h4 class="pt-0">Payroll Records</h4>
            <p class="pt-0"></p>
        </div>
    </div>

    <div id="printDiv">
        <table class="table align-middle mb-4 text-center bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Salary Type</th>
                    <th>Salary</th>
                    <th>Deduction</th>
                    <th>Reason</th>
                    <th>Net Pay</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee->name }}</td>
                    <td>{{ $payroll->date }}</td>
                    <td>{{ $payroll->employee->department->department_name }}</td>
                    <td>{{ $payroll->employee->designation->designation_name }}</td>
                    <td>{{ $payroll->month }}</td>
                    <td>{{ $payroll->year }}</td>
                    <td>{{ $payroll->salaryStructure->salary_class }}</td>
                    <td>{{ $payroll->salaryStructure->total_salary }}</td>
                    <td>{{ $payroll->deduction }}</td>
                    <td>{{ $payroll->reason }}</td>
                    <td>{{ $payroll->total_payable }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-25 mx-auto">
        {{-- {{ $salaries->links() }} --}}
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