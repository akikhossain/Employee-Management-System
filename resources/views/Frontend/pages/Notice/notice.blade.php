@extends('admin.master')
@section('content')
    <div class="shadow p-4 d-flex justify-content-between align-items-center ">
        <h4 class="text-uppercase">Create Notice</h4>
    </div>
    <div class="container my-5 py-5">

        <!--Section: Form Design Block-->
        <section>

            <div>
                <div class="w-75 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-font text-uppercase">Notice Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('notice.store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Notice
                                                title:</label>
                                            <input required placeholder="Enter Notice title" type="text"
                                                id="form11Example1" name="notice_title" class="form-control" />
                                        </div>
                                        <div class="mt-2">
                                            @error('notice_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label mt-2 fw-bold " for="form11Example1">Notice
                                                Description</label>
                                            <textarea required placeholder="notice description" type="text" id="form11Example1" name="description"
                                                class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="mt-2">
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
