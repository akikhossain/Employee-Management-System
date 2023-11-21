@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">View Employee Details</h4>
        <div>
            <a href="{{ route('manageEmployee.addEmployee') }}" class="btn btn-info p-2 text-lg rounded">Add New
                Employee</a>
        </div>
    </div>
    <div class="  my-5 py-5">
        <table class="table align-middle text-center w-75 mx-auto bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Employee Name</th>
                    <th>Image</th>
                    <th>Employee ID</th>
                    <th>Department</th>
                    <th>Designation</th>
                    {{-- <th>Password</th> --}}
                    {{-- <th>Phone</th> --}}
                    {{-- <th>Email</th> --}}
                    {{-- <th>Salary</th> --}}
                    {{-- <th>Location</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

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
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->designation }}</td>
                        {{-- <td>{{ $employee->password }}</td> --}}
                        {{-- <td>{{ $employee->phone }}</td> --}}
                        {{-- <td>{{ $employee->email }}</td> --}}
                        {{-- <td>{{ $employee->salary }}</td> --}}
                        {{-- <td>{{ $employee->location }}</td> --}}
                        <td>
                            <a class="btn btn-warning " href="{{ route('Employee.profile', $employee->id) }}">View</a>
                            <a class="btn btn-success" href="{{ route('Employee.edit', $employee->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('Employee.delete', $employee->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-25 mx-auto mt-4">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
