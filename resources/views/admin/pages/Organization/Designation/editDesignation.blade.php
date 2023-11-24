@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Edit Designation</h4>
    </div>
    <div class="container my-5 py-5">

        <!--Section: Form Design Block-->
        <section>
            <div class="d-flex gap-5 justify-content-center align-content-center ">

                {{-- Department  Form start --}}
                <div class="text-left w-50 ">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="text-uppercase">Update Designation</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('designation.update', $designation->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Designation ID</label>
                                            <input value="{{ $designation->designation_id }}" type="text"
                                                class="form-control" name="designation_id" id="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class=" col">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label mt-2" for="form11Example1">Designation Name</label>
                                                <input value="{{ $designation->designation_name }}" type="text"
                                                    class="form-control" name="designation_name" id="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class=" col">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label mt-2" for="form11Example1">Salary</label>
                                                <input value="{{ $designation->salary }}" type="number"
                                                    class="form-control" name="salary" id="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center w-25 mx-auto">
                                    <button type="submit" class="btn btn-info p-2 rounded">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Department Table start --}}
                {{-- <div class="w-75 card">
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
                                            <a class="btn btn-success" href="">Edit</a>
                                            <a class="btn btn-danger" href="">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>

        </section>
    </div>
@endsection