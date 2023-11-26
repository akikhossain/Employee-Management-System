@extends('Frontend.master')
@section('content')

<main class="container my-5">
    <h1 class="text-center">Service Details</h1>
    <div class="row">
        <div class="col-12 mt-5">
            <article class="mx-auto">
                {{-- <h2>Posted on January 1, 2023 by Start Bootstrap</h2> --}}
                <h2>{{ $services->description }}</h2>
                <img style="width: 900px; height: 400px;" src="{{ url('/uploads//' . $services->service_image) }}"
                    alt="service image" class="mb-5">
                <h4 class="mt-4">{{ $services->details }}</h4>
            </article>
        </div>
    </div>
</main>
@endsection