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
    <tr>
      <td>  
          <div>
            <p class="fw-bold mb-1">Akik Hossain</p>
          </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Software engineer</p>
      </td>
      <td>01701476579</td>
      <td>20103087@iubat.edu</td>
      <td>50000</td>
      <td>
        <button type="button"
        class="btn btn-link btn-rounded btn-sm fw-bold"
        data-mdb-ripple-color="dark">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>  
          <div>
            <p class="fw-bold mb-1">Abdul Karim</p>
          </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Junior Web Developer</p>
      </td>
      <td>1245576</td>
      <td>test@practice.com</td>
      <td>10000</td>
      <td>
        <button type="button"
        class="btn btn-link btn-rounded btn-sm fw-bold"
        data-mdb-ripple-color="dark">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>  
          <div>
            <p class="fw-bold mb-1">Rahim Mia</p>
          </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Android Developer</p>
      </td>
      <td>01701475646</td>
      <td>test@gmail.com</td>
      <td>20000</td>
      <td>
        <button type="button"
        class="btn btn-link btn-rounded btn-sm fw-bold"
        data-mdb-ripple-color="dark">
          Edit
        </button>
      </td>
    </tr>
  </tbody>
</table>

@endsection