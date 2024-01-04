@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase"> Task List</h4>
</div>
<div class="container my-5 py-5">
    {{-- Department Table start --}}
    <div class="w-100 mx-auto">
        <div>
            <table class="table align-middle mb-4 text-center bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Total Days</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $task->employee->name }}</td>
                        <td>{{ $task->employee->department->department_name }}</td>
                        <td>{{ $task->employee->designation->designation_name }}</td>
                        <td>{{ $task->from_date }}</td>
                        <td>{{ $task->to_date }}</td>
                        <td>{{ $task->total_days }}</td>
                        {{-- <td>
                            <a class="btn btn-success rounded-pill fw-bold text-white" href=""><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-danger rounded-pill fw-bold text-white" href=""><i
                                    class="fa-solid fa-trash"></i></a>
                        </td> --}}
                        <td>
                            @if($task->status == 'completed on time')
                            <span class="text-white fw-bold bg-green rounded-pill p-2">Completed on time</span>
                            @elseif($task->status == 'completed in late')
                            <span class="text-white fw-bold bg-red rounded-pill p-2">Completed Late.</span>
                            @else
                            <span class="text-white fw-bold bg-warning rounded-pill p-2">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection