@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">View salary List</h4>
    <div>
        <a href="{{ route('service.form') }}" class="btn btn-success p-2 text-lg rounded-pill"><i
                class="fa-solid fa-plus me-2"></i>Create New
            Service</a>
    </div>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center bg-white">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Service Title</th>
                <th>Service Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $key => $item)
            <tr>
                <td>
                    <div>
                        <p class="fw-bold mb-1">{{ $key + 1 }}</p>
                    </div>
                </td>
                <td>{{ $item->service_name }}</td>
                <td>{{ $item->description }}</td>
                <td><img class="avatar p-1" src="{{ url('/uploads//' . $item->service_image) }}" alt=""></td>
                <td>
                    <a class="btn btn-success rounded-pill" target="_blank" href="{{ route('services') }}">View</a>
                    <a class="btn btn-warning rounded-pill" href="">Edit</a>
                    <a class="btn btn-danger rounded-pill" href="">Delete</a>
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