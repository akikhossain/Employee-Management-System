@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Create Task</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>
        {{-- Department Form start --}}
        <div class="text-left w-50 mx-auto mb-5 ">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="text-uppercase">New Task</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeTask') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label mt-2 fw-bold" for="task_name">Assign Employee</label>
                                    <select name="employee_id" class="form-control" id="employeeSelect">
                                        <option value="">Select an Employee</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label mt-2 fw-bold" for="task_name">Task Name</label>
                                    <input type="text" id="task_name" name="task_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label mt-2 fw-bold" for="task_name">From Date</label>
                                    <input type="date" name="from_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label mt-2 fw-bold" for="task_name">To Date</label>
                                    <input type="date" name="to_date" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label mt-2 fw-bold" for="task_description">Task
                                        Description</label>
                                    <textarea id="task_description" cols="30" name="task_description"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center w-25 mx-auto">
                            <button type="submit" class="btn btn-success p-2 px-3 rounded-pill">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection