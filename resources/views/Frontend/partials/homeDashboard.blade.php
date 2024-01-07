@extends('Frontend.master')
@section('content')


<div class="item">
    <div class="slider-img">
        <img src="{{ asset('assests/image/service 9.jpg') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="slider-captions">
                    <h1 class="slider-title fw-bold text-white">Human Resources Management Service</h1>
                    <p class="text-dark text-white">Empowering businesses through strategic talent solutions and
                        seamless HR management.</p>
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
</div>
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
            @foreach ($clients as $item)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="client-block">
                    <div class="client-head">
                        <a href="#" class="client-img"><img src="{{ url('/uploads//' . $item->client_image) }}"
                                alt=""></a>
                    </div>
                    <div class="client-content">
                        <h4><a href="#">{{ $item->client_name }}</a></h4>
                        <p>{{ $item->details }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
    </div>
</div>
@endsection