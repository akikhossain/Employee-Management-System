@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center">
    <h4 class="text-uppercase">Notice List</h4>
    <div>
        <a href="{{ route('notice.create') }}" class="btn btn-success p-2 text-lg rounded-pill">Create New
            Notice</a>
    </div>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center bg-white">
        <thead class="bg-light">
            <tr>
                <th>Date</th>
                <th>Notice About</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices as $key => $notice)
            <tr>
                <td>{{ $notice->select_date }}</td>
                <td>{{ $notice->notice_title }}</td>
                <td>{{ $notice->description }}</td>
                <td>
                    <a class="btn btn-success rounded-pill" href="{{ route('noticeEdit', $notice->id) }}">Edit</a>
                    <a class="btn btn-danger rounded-pill" href="{{ route('noticeDelete', $notice->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-25 mx-auto">
        {{-- {{ $salaries->links() }} --}}
    </div>
</div>
@endsection