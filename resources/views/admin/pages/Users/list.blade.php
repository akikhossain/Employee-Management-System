@extends('admin.master')

@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">User List</h4>
    </div>
    <div class="  my-5 py-5">
        <a href="{{ route('users.create') }}" class="btn btn-success">Create new User</a>
        <table class="table align-middle text-center w-100 bg-white">
            <thead class="bg-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
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
                        <td>
                            {{-- <img style="border-radius: 60px;" width="7%"
                                src="" alt=""> --}}
                            <img class="avatar p-1" src="{{ url('/uploads//' . $user->image) }}" alt="">
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a class="btn btn-success" href="">View</a>
                            <a class="btn btn-warning" href="">Edit</a>
                            <a class="btn btn-danger"href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-25 mx-auto mt-4">
        </div>
    </div>
@endsection
