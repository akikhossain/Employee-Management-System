@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">My Leave Balance</h4>

</div>
<div class="my-5 py-5">
    <table class="table align-middle text-center w-75 mx-auto bg-white">
        <thead class="bg-light">
            <tr>
                <th>SL ID</th>
                <th>Leave Type</th>
                <th>Total Days</th>
                <th>Taken Days</th>
                <th>Available Days</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="w-25 mx-auto mt-4">
    </div>
</div>
@endsection
