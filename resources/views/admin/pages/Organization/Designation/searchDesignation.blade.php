@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Designation List</h4>
    <div>
        <a href="{{ route('organization.designation') }}" class="btn btn-success p-2 text-lg rounded-pill"><i
                class="fa-solid fa-plus me-1"></i>Create
            Designation</a>
    </div>
</div>
<div class="container my-5 py-5">

    <div class="fw-normal mb-4">
        <h2 class="fw-normal fs-5 mx-auto text-center rounded-pill p-2 w-50 mb-5
            @if ($designations->count() > 0) bg-success
            @else
                bg-danger text-white @endif">
            @if ($designations->count() === 1)
            Found 1 matching data for "{{ request()->search }}"
            @elseif ($designations->count() > 1)
            Found {{ $designations->count() }} matching data for "{{ request()->search }}"
            @else
            No Data found for "{{ request()->search }}"
            @endif
        </h2>
    </div>

    @if ($designations->count() > 0)

    {{-- Department Table start --}}
    <div>
        <table class="table align-middle mb-4 text-center bg-white">
            <thead class="bg-light">
                <tr>
                    <th>SL NO</th>
                    <th>Designation ID</th>
                    <th>Designation Name</th>
                    <th>Department Name</th>
                    <th>Salary Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($designations as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->designation_id }}</td>
                    <td>{{ $item->designation_name }}</td>
                    <td>{{ optional($item->department)->department_name }}</td>
                    {{-- <td>{{ $item->salary->salary_class }}</td> --}}
                    <td>{{ optional($item->salary)->salary_class }}</td>
                    <td>
                        <a class="btn btn-success rounded-pill fw-bold text-white"
                            href="{{ route('designation.edit', $item->id) }}">Edit</a>
                        <a class="btn btn-danger rounded-pill fw-bold text-white"
                            href="{{ route('designation.delete', $item->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection