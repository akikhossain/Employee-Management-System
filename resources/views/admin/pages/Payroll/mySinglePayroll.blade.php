@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline justify-content-end">
                <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;">PaySlip >> <strong></strong></p>
                </div>
                <div class="col-xl-3 float-end">
                    <button onclick="printContent('printDiv')" class="btn btn-light text-capitalize border-0"
                        data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</button>
                </div>
                <hr>
            </div>

            @foreach($employeePayrolls as $item)
            <div id="printDiv">
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="{{ asset('assests/image/logo.jpeg') }}" alt=""
                                class="img-fluid rounded-circle mx-auto" style="max-width: 100px;">
                            <h1 class="pt-0">HR HUB 360</h1>
                            <p class="pt-0">Employee Management System</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Name:</span> {{ $item->employee->name
                                    }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Phone:</span> {{ $item->employee->phone }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Location:</span> {{ $item->employee->location }}</li>

                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    <i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span class="fw-bold">Designation: </span>
                                    {{ optional($item->employee->designation)->designation_name ?? 'Not specified' }}
                                </li>

                                <li class="text-muted">
                                    <i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span class="fw-bold">Department: </span>
                                    {{ optional($item->employee->department)->department_name ?? 'Not specified' }}
                                </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span>{{ $item->date }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    {{-- <th>Employee</th>
                                    <th>Date</th>
                                    <th>Dept</th>
                                    <th>desig</th> --}}
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Salary Type</th>
                                    <th>Salary</th>
                                    {{-- <th>Deduction</th>
                                    <th>Reason</th>
                                    <th>Net Pay</th>
                                    <th>status</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                {{-- <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->employee->department->department_name }}</td>
                                <td>{{ $item->employee->designation->designation_name }}</td> --}}
                                <td>{{ $item->month }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ $item->salaryStructure->salary_class }}</td>
                                <td>{{ $item->salaryStructure->total_salary }} BDT</td>
                                {{-- <td>{{ $item->deduction }}</td>
                                <td>{{ $item->reason }}</td>
                                <td>{{ $item->total_payable }}</td> --}}
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Salary Information</p>

                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Deduction({{
                                        $item->reason }})</span>{{
                                    $item->deduction }} BDT</li>
                            </ul>
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                    style="font-size: 25px;">{{ $item->total_payable }} BDT</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>© 2024 Copyright: Employee Management System | Akik Hossain</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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