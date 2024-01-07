@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Edit Client</h4>
    <div>
        <a href="{{ route('viewClientList') }}" class="btn btn-success p-2 text-lg rounded-pill"><i
                class="fa-solid fa-plus me-2"></i>Client List</a>
    </div>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>

        <div>
            <div class="w-75 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">Edit Client Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clientUpdate', $client->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Client
                                            Name:</label>
                                        <input required value="{{ $client->client_name }}"
                                            placeholder="Enter service Name" type="text" id="form11Example1"
                                            name="client_name" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('client_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Image</label>
                                        <input type="file" id="form11Example1" name="client_image"
                                            class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('client_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label mt-2 fw-bold " for="form11Example1">Client Details</label>
                                <textarea type="text" id="form11Example1" name="details"
                                    class="form-control">{{ $client->details }}</textarea>
                            </div>
                            <div class="text-center w-25 mx-auto mt-3">
                                <button type="submit"
                                    class="btn btn-success p-2 text-lg  rounded-pill col-md-10">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection