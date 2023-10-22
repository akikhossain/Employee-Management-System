@extends('admin.master')

@section('content')

<h4 class="shadow p-4 text-uppercase">View Employee Details</h4>
<div class="container my-5 py-5">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Designation</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Salary</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($employees as $employee)
    <tr>
      <td>  
          <div>
            <p class="fw-bold mb-1">{{$employee->name}}</p>
          </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$employee->designation}}</p>
      </td>
      <td>{{$employee->phone}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->salary}}</td>
      <td>
        <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>

@endsection