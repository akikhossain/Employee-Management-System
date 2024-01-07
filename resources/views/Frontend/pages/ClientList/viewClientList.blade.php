@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Client List</h4>
    <div>
        <a href="{{ route('client.form') }}" class="btn btn-success p-2 text-lg rounded-pill"><i
                class="fa-solid fa-plus me-2"></i>Create New
            Client</a>
    </div>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center bg-white">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Client Details</th>
                <th>Client Company Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $key => $item)
            <tr>
                <td>
                    <div>
                        <p class="fw-bold mb-1">{{ $key + 1 }}</p>
                    </div>
                </td>
                <td>{{ $item->client_name }}</td>
                <td>{{ $item->details }}</td>
                <td><img class="avatar p-1" src="{{ url('/uploads//' . $item->client_image) }}" alt=""></td>
                <td>
                    <a class="btn btn-warning rounded-pill" href="{{ route('clientEdit', $item->id) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-danger rounded-pill" href="{{ route('clientDelete', $item->id) }}"><i
                            class="fa-solid fa-trash"></i></a>
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