@extends('Frontend.master')
@section('content')
<div class="">
    <div class="owl-carousel owl-one">
        <div class="item">
            <div class="slider-img">
                <img src="https://i.ibb.co/Wft0Sb8/sean-pollock-Ph-Yq704ffd-A-unsplash.jpg" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="slider-captions">
                            <h1 class="slider-title fw-bold text-white">Human Resources Management Service</h1>
                            <p class="text-dark text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facilis,
                                aspernatur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.slider -->
<!-- services -->
<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>HR Consultation Services</h2>
                    <a href="{{ route('services') }}" class="btn-link">View All Services</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- service-block -->
            @foreach ($services->take(4) as $item)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="service-block">
                    <div class="service-img"><img class="" src="{{ url('/uploads//' . $item->service_image) }}" alt="">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a href="#" class="title">{{ $item->service_name }}</a>
                        </h3>
                        <p>{{ $item->description }}</p>
                        <a href="{{ route('services.details', $item->id) }}">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /.service-block -->
        </div>
        <div class="row hidden-service-cards" style="display: none;">
            <!-- Hidden service cards initially -->
            @foreach ($services->slice(4) as $item)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 hidden-card">
                <div class="service-block">
                    <div class="service-img"><img class="" src="{{ url('/uploads//' . $item->service_image) }}" alt="">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a href="#" class="title">{{ $item->service_name }}</a>
                        </h3>
                        <p>{{ $item->description }}</p>
                        <a href="{{ route('services.details', $item->id) }}">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /.services -->


<!-- features-section -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>Why Choose Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- features-center -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="feature-center line">
                    <div class="feature-icon">
                        <i class="fa-solid fa-briefcase fa-xl"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Industry Leadership</h3>
                        <p> Pioneering innovation, setting new standards, and shaping our sector's future through
                            leadership and progress.</p>
                    </div>
                </div>
            </div>
            <!-- /.features-center -->
            <!-- features-center -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="feature-center line">
                    <div class="feature-icon">
                        <i class="fa-solid fa-thumbs-up fa-xl"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Mission and Values</h3>
                        <p>Guided by our commitment to innovation and sustainability, our ethos upholds integrity,
                            values, and inclusivity, ensuring ethical alignment in all endeavors.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.features-center -->
            <!-- features-center -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="feature-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-people-group fa-xl"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Employee Satisfaction</h3>
                        <p> Our culture prioritizes growth, balance, and inclusivity, nurturing a devoted team for
                            consistent excellence.</p>
                    </div>
                </div>
            </div>
            <!-- /.features-center -->
        </div>
    </div>
</div>
<!-- /.features-section -->
<!-- testimonial-section -->
{{-- <div class="space-medium bg-success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1 class="text-warning fw-bold">Notice!!!</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial-carousel owl-carousel owl-theme owl-two">
                @foreach ($notices as $notice)
                <!-- testimonial-item -->
                <div class="item">
                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                        <div class="testimonial-block">
                            <div class="testimonial-content">
                                <h2 class="text-white">{{ $notice->notice_title }}</h2>
                                <p class="testimonial-text">“{{ $notice->description }}”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.testimonial-item -->
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
</div>
<!-- /.testimonial-section -->
<!-- clients logo -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>We Succeed Because Our Clients Succeed</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- clients logo -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="client-block">
                    <div class="client-head">
                        <a href="#" class="client-img"><img
                                src="https://i.ibb.co/wcXLm0k/Screenshot-2023-11-27-000526.png" alt=""></a>
                    </div>
                    <div class="client-content">
                        <h4><a href="#">Growth</a></h4>
                        <p>Becenas in suscipit veliuleres ue mauris oneepurus sedelitsei spit vennibh
                            sulimauris. </p>
                    </div>
                </div>
            </div>
            <!-- /.clients logo -->
            <!-- clients logo -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="client-block">
                    <div class="client-head">
                        <a href="#" class="client-img"><img
                                src="https://i.ibb.co/cLjY3M9/Screenshot-2023-11-27-000519.png" alt=""></a>
                    </div>
                    <div class="client-content">
                        <h4><a href="#">Metrics</a></h4>
                        <p>Ecenas in suscipit veliuleres ue mauris oneepurus sedelitseitt spit vennibh
                            suscipieliu. </p>
                    </div>
                </div>
            </div>
            <!-- /.clients logo -->
            <!-- clients logo -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="client-block">
                    <div class="client-head">
                        <a href="#" class="client-img"><img
                                src="https://i.ibb.co/23X6SvD/Screenshot-2023-11-27-000457.png" alt=""></a>
                    </div>
                    <div class="client-content">
                        <h4><a href="#">Servicequick</a></h4>
                        <p>Aecenas in suscipit veliuleres ue mauris oneepurus sedelitsei spit vennh suliulerue.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.clients logo -->
            <!-- clients logo -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="client-block">
                    <div class="client-head">
                        <a href="#" class="client-img"><img
                                src="https://i.ibb.co/FbzNSjg/Screenshot-2023-11-27-000438.png" alt=""></a>
                    </div>
                    <div class="client-content">
                        <h4><a href="#">Zorko</a></h4>
                        <p>Maecenas in suscipit veliuleres ue mauris oneepurus sedelitsei spit vennibh suscipis.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.clients logo -->
        </div>
        <hr>
        <!-- /.clients logo -->
    </div>
</div>
@endsection