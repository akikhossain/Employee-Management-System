@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Create Payroll</h2>
            <hr>
            <!-- Form to create payroll -->
            <form method="POST" action="{{ route('admin.createPayroll') }}">
                @csrf
                <!-- Select employee and other payroll fields -->
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Select Employee</label>
                    <select class="form-select" id="employee_id" name="employee_id" required>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Add other fields for payroll -->
                <button type="submit" class="btn btn-primary">Create Payroll</button>
            </form>
        </div>
    </div>
</div>
@endsection