@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Leave Status</h4>
    </div>
    <div class="  my-5 py-5">
        <table class="table align-middle text-center w-100 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <p class="fw-bold mb-1"></p>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="btn btn-success" href="">Accept</a>
                        <a class="btn btn-danger" href="">Reject</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="w-25 mx-auto mt-4">
        </div>
    </div>
@endsection
