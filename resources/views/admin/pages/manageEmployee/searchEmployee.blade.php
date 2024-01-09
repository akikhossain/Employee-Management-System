@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Searched Employee</h4>
    <div>
        <a href="{{ route('manageEmployee.addEmployee') }}" class="btn btn-success p-2 text-lg rounded-pill">Add New
            Employee</a>
    </div>
</div>
<div class="mt-5 py-3">

    <div class="fw-normal mb-4">
        <h2 class="fw-normal fs-5 mx-auto text-center rounded-pill p-2 w-50 mb-5
            @if ($employees->count() > 0) bg-success
            @else
                bg-danger text-white @endif">
            @if ($employees->count() === 1)
            Found 1 matching data for "{{ request()->search }}"
            @elseif ($employees->count() > 1)
            Found {{ $employees->count() }} matching data for "{{ request()->search }}"
            @else
            No Data found for "{{ request()->search }}"
            @endif
        </h2>
    </div>



    @if ($employees->count() > 0)

    <div class="float-end mb-5">
        <button onclick="printContent('printDiv')" class="btn btn-danger text-capitalize border-0"
            data-mdb-ripple-color="dark"><i class="fa-solid fa-print me-1"></i>Print</button>
    </div>

    <div id="printDiv">
        <div class="col-md-12 mt-5 mb-4">
            <div class="text-center">
                <h4 class="pt-0">Employee Records</h4>
                <p class="pt-0"></p>
            </div>
        </div>
        <table class="table align-middle text-center   bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Employee Name</th>
                    <th>Image</th>
                    <th>Employee ID</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Salary Grade</th>
                    <th>Mode of Join</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Body -->
                @foreach ($employees as $key => $employee)
                <tr>
                    <td>
                        <div>
                            <p class="fw-bold mb-1">{{ $key + 1 }}</p>
                        </div>
                    </td>
                    <td>{{ $employee->name }}</td>
                    <td><img class="avatar p-1" src="{{ url('/uploads//' . $employee->employee_image) }}" alt="">
                    </td>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->department->department_name }}</td>
                    <td>{{ $employee->designation->designation_name }}</td>
                    <td>{{ $employee->salaryStructure->salary_class}}</td>
                    <td>{{ $employee->joining_mode}}</td>
                    <td>
                        <a class="btn btn-warning rounded-pill fw-bold text-white"
                            href="{{ route('Employee.profile', $employee->id) }}">View</a>
                        <a class="btn btn-success rounded-pill fw-bold text-white"
                            href="{{ route('Employee.edit', $employee->id) }}">Edit</a>
                        <a class="btn btn-danger rounded-pill fw-bold text-white"
                            href="{{ route('Employee.delete', $employee->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
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