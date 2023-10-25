@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">View Attendance List</h4>
        <div>
            <a href="{{ route('attendance.addAttendance') }}" class="btn btn-info p-2 text-lg rounded">Add New Attendance</a>
        </div>
    </div>
    <div class="container my-5 py-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>ID NO</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Date</th>
                    <th>Sign In</th>
                    <th>Sign Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <p class="fw-bold mb-1">01</p>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Akik Hossain</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Web Developer</p>
                    </td>
                    <td>20.10.2023</td>
                    <td>9.30 AM</td>
                    <td>5.15 PM</td>
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <p class="fw-bold mb-1">01</p>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Lionel Messi</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Software Engineer</p>
                    </td>
                    <td>20.10.2023</td>
                    <td>8.30 AM</td>
                    <td>6.15 PM</td>
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <p class="fw-bold mb-1">01</p>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Mohammad Salah</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Junior Web Developer</p>
                    </td>
                    <td>20.10.2023</td>
                    <td>10.30 AM</td>
                    <td>4.15 PM</td>
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
