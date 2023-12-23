@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Designation Form</h4>
    <div>
        <a href="{{ route('organization.designationList') }}" class="btn btn-success p-2 text-lg rounded-pill"> View
            Designation List</a>
    </div>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->


    {{-- Department Form start --}}
    <div class="text-left w-50 mx-auto">
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
                                    <input type="text" class="form-control" name="designation_name" id="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label mt-2" for="form11Example1">Deparment Name</label>
                                <select type="text" class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class=" col">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label mt-2" for="form11Example1">Salary Class</label>
                                    <select required class="form-control" name="salary_structure_id">
                                        @foreach ($salaries as $salary)
                                        <option value="{{$salary->id}}">{{ $salary->salary_class }}</option>
                                        @endforeach
                                    </select>
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
</div>
@endsection