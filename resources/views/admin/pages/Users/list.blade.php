@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">User List</h4>
    <div>
        <a href="{{ route('users.create', ['employeeId' => $employee->id]) }}"
            class="btn btn-success p-2 text-lg rounded-pill"><i class="fa-solid fa-plus me-2"></i>Create new User</a>
    </div>
</div>
<div class="my-5 py-5">

    <div class="d-flex justify-content-end">
        <div class="input-group rounded w-25 mb-5">
            <form action="{{ route('searchUser') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button type="submit" class="input-group-text border-0 bg-transparent" id="search-addon"
                        style="display: inline;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <table class="table align-middle text-center  w-75 mx-auto bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Image</th> --}}
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                {{-- <td><img class="avatar p-1" src="{{ url('/uploads//' . $user->image) }}" alt=""></td> --}}
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a class="btn btn-outline-info rounded-pill" data-mdb-ripple-color="dark"
                        href="{{ route('users.profile.view', $user->id) }}">View</a>
                    <a class="btn btn-outline-dark btn-rounded rounded-pill" data-mdb-ripple-color="dark"
                        href="{{route('edit',$user->id)}}">Edit</a>
                    <a class="btn btn-outline-danger btn-rounded rounded-pill" data-mdb-ripple-color="dark"
                        href="{{route('delete',$user->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-25 mx-auto mt-4">
    </div>
</div>
@endsection