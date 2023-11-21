@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">User List</h4>
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-info p-2 text-lg rounded">Create new User</a>
        </div>
    </div>
    <div class="  my-5 py-5">
        {{-- <a href="{{ route('users.create') }}" class="btn btn-success">Create new User</a> --}}
        <table class="table align-middle text-center  w-75 mx-auto bg-white">
            <thead class="bg-light">
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        {{-- <td>{{ $key + 1 }}</td> --}}
                        <div>
                            <td class="d-flex gap-3 justify-content-center align-items-center ">
                                <div>
                                    <img class="avatar p-1" src="{{ url('/uploads//' . $user->image) }}" alt="">
                                </div>
                                <div class="text-center">
                                    {{ $user->name }}
                                </div>
                            </td>
                        </div>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a class="btn btn-outline-info btn-rounded" data-mdb-ripple-color="dark"
                                href="{{ route('users.profile.view', $user->id) }}">View</a>
                            <a class="btn btn-outline-dark btn-rounded" data-mdb-ripple-color="dark"href="">Edit</a>
                            <a class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark"
                                href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-25 mx-auto mt-4">
        </div>
    </div>
@endsection
