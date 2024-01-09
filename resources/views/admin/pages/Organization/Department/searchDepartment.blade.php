@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Department List</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>

        <div class="fw-normal mb-4">
            <h2 class="fw-normal fs-5 mx-auto text-center rounded-pill p-2 w-50 mb-5
                @if ($departments->count() > 0) bg-success
                @else
                    bg-danger text-white @endif">
                @if ($departments->count() === 1)
                Found 1 matching data for "{{ request()->search }}"
                @elseif ($departments->count() > 1)
                Found {{ $departments->count() }} matching data for "{{ request()->search }}"
                @else
                No Data found for "{{ request()->search }}"
                @endif
            </h2>
        </div>

        @if ($departments->count() > 0)
        {{-- Department Table start --}}
        <div class="">
            <div>
                <table class="table align-middle mb-4 text-center bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>SL NO</th>
                            <th>Deparment ID</th>
                            <th>Department Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->department_id }}</td>
                            <td>{{ $item->department_name }}</td>
                            <td>
                                <a class="btn btn-success rounded-pill fw-bold text-white"
                                    href="{{ route('Organization.edit', $item->id) }}">Edit</a>
                                <a class="btn btn-danger rounded-pill fw-bold text-white"
                                    href="{{ route('Organization.delete', $item->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection