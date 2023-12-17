@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Designation List</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>
        <div class="d-flex gap-5 justify-content-center align-content-center ">

            {{-- Department Form start --}}
            <div class="text-left w-25 ">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="text-uppercase">New Designation</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('organization.designation.store') }}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label mt-2" for="form11Example1">Designation ID</label>
                                        <input type="text" class="form-control" name="designation_id" id="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class=" col">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Designation Name</label>
                                            <input type="text" class="form-control" name="designation_name" id=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class=" col">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Salary</label>
                                            <input type="number" class="form-control" name="salary" id="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto">
                                <button type="submit" class="btn btn-info p-2 rounded">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Department Table start --}}
            <div class="w-75 card">
                <div>
                    <table class="table align-middle mb-4 text-center bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Designation ID</th>
                                <th>Designation Name</th>
                                <th>Salary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->designation_id }}</td>
                                <td>{{ $item->designation_name }}</td>
                                <td>{{ $item->salary }}</td>
                                <td>
                                    <a class="btn btn-success rounded-pill fw-bold text-white"
                                        href="{{ route('designation.editDesign', $item->id) }}">Edit</a>
                                    <a class="btn btn-danger rounded-pill fw-bold text-white"
                                        href="{{ route('designation.delete', $item->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection