@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Update Leave Type</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>
        <div class="d-flex gap-5 justify-content-center align-content-center ">

            {{-- Department Form start --}}
            <div class="text-left w-50 ">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="text-uppercase">Update Leave Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('leave.leaveType.update', $leaveType->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label mt-2" for="form11Example1">Leave Type</label>
                                        <input value="{{ $leaveType->leave_type_id }}" placeholder="Enter Leave Type"
                                            class="form-control" name="leave_type_id" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class=" col">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label mt-2" for="form11Example1">Leave Days</label>
                                            <input value="{{ $leaveType->leave_days }}" placeholder="Number of Days"
                                                class="form-control" name="leave_days" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto">
                                <button type="submit" class="btn btn-success p-2 px-3 rounded-pill">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection