@extends('Frontend.master')
@section('content')
<header class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Welcome to Blog Post!</h1>
        </div>
    </div>
</header>
<main class="container">
    <div class="row">
        <div class="col-12">
            <article>
                <h2>Posted on January 1, 2023 by Start Bootstrap</h2>
                <h3>Web Design &middot; Freebies</h3>
                @foreach ($services as $item)
                <img style="width: 900px; height: 400px;" src="{{ url('/uploads//' . $services->service_image) }}"
                    alt="Blog post image">
                <p>{{ $services->description }}</p>
                <p>{{ $services->details }}</p>
                @endforeach
            </article>
        </div>
    </div>
</main>
@endsection