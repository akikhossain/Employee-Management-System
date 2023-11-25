@extends('admin.master')
@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center ">
    <h4 class="text-uppercase">Create Service</h4>
</div>
<div class="container my-5 py-5">

    <!--Section: Form Design Block-->
    <section>

        <div>
            <div class="w-75 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-font text-uppercase">Service Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Service
                                            Name:</label>
                                        <input required placeholder="Enter service Name" type="text" id="form11Example1"
                                            name="service_name" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('service_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Service
                                            Description</label>
                                        <input required placeholder="Service Title" type="text" id="form11Example1"
                                            name="description" class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label mt-2 fw-bold " for="form11Example1">Image</label>
                                        <input type="file" id="form11Example1" name="service_image"
                                            class="form-control" />
                                    </div>
                                    <div class="mt-2">
                                        @error('service_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label mt-2 fw-bold " for="form11Example1">Service Details</label>
                                <textarea type="text" id="form11Example1" name="details" class="form-control" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <div class="text-center w-25 mx-auto mt-3">
                                <button type="submit"
                                    class="btn btn-info p-2 text-lg  rounded col-md-10">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection