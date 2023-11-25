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
                        <a href="{{ route('services') }}" class="btn-link">View Services</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- service-block -->
                @foreach ($services->take(4) as $item)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="service-block">
                            <div class="service-img"><img class=""
                                    src="{{ url('/uploads//' . $item->service_image) }}" alt="">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="#" class="title">{{ $item->service_name }}</a>
                                </h3>
                                <p>{{ $item->description }}</p>
                                <a href="#">More Details</a>
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
                            <div class="service-img"><img class=""
                                    src="{{ url('/uploads//' . $item->service_image) }}" alt="">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="#" class="title">{{ $item->service_name }}</a>
                                </h3>
                                <p>{{ $item->description }}</p>
                                <a href="#">More Details</a>
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
                <!-- features-center -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-center line">
                        <div class="feature-icon">
                            <i class="icon-network"></i>
                        </div>
                        <div class="feature-content">
                            <h3>How We Work</h3>
                            <p>Maecenas in suscipit veliulerisque mauris oneepurus sedelit spit vennibh.</p>
                            <a href="#" class="btn-link">learn more</a>
                        </div>
                    </div>
                </div>
                <!-- /.features-center -->
                <!-- features-center -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-center line">
                        <div class="feature-icon">
                            <i class="icon-like"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Why Choose Us</h3>
                            <p>Nulla sit amet ultricies lisis eronunc in diam imperdiet frins quis pretium massa.
                            </p>
                            <a href="#" class="btn-link">Reasons to experience</a>
                        </div>
                    </div>
                </div>
                <!-- /.features-center -->
                <!-- features-center -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-center">
                        <div class="feature-icon">
                            <i class="icon-users"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Meet The Team</h3>
                            <p>Aliquam eget vestisitet lacus sitamet elitf ringilla alieurna eli dignissim.</p>
                            <a href="#" class="btn-link">Meet leaders</a>
                        </div>
                    </div>
                </div>
                <!-- /.features-center -->
            </div>
        </div>
    </div>
    <!-- /.features-section -->
    <!-- testimonial-section -->
    <div class="space-medium bg-success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1 class="text-danger fw-bold">Notice!!!</h1>
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
                                        <h2 class="text-white">Update: {{ $notice->notice_title }}</h2>
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
    </div>
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
                            <a href="#" class="client-img"><img src="./images/client_logo_1.png" alt=""></a>
                        </div>
                        <div class="client-content">
                            <h4><a href="#">Your Company</a></h4>
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
                            <a href="#" class="client-img"><img src="./images/client_logo_2.png"
                                    alt=""></a>
                        </div>
                        <div class="client-content">
                            <h4><a href="#">Sample Text</a></h4>
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
                            <a href="#" class="client-img"><img src="./images/client_logo_3.png"
                                    alt=""></a>
                        </div>
                        <div class="client-content">
                            <h4><a href="#">Dummy Company</a></h4>
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
                            <a href="#" class="client-img"><img src="./images/client_logo_4.png"
                                    alt=""></a>
                        </div>
                        <div class="client-content">
                            <h4><a href="#">Your Company</a></h4>
                            <p>Maecenas in suscipit veliuleres ue mauris oneepurus sedelitsei spit vennibh suscipis.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.clients logo -->
            </div>
            <hr>
            <!-- /.clients logo -->
            <div class="row">
                <!-- consultation form -->
                {{-- <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                    <h2 class="text-center mb40">Learn more about HR Consulting Services from HRMS</h2>
                    <div class="consultantion-form">
                        <h3 class="mb30 text-center">Request A Consultation </h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name"> First Name</label>
                                        <input type="text" placeholder="First Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name"> Last Name</label>
                                        <input type="text" placeholder="Last Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name">Phone</label>
                                        <input type="text" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="company">Company</label>
                                        <input type="text" placeholder="company" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="select"></label>
                                        <select name="select" class="form-control">
                                            <option value="">I am interested in</option>
                                            <option value="">HR Audit &amp; Assessment</option>
                                            <option value="">Legal &amp; HR Compliance</option>
                                            <option value="">Employment Practices</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control  pdt20" id="textarea" name="textarea" rows="4"
                                            placeholder="Please describe your HR needs:"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" name="singlebutton"
                                        class="btn btn-primary  btn-lg ">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
            <!-- /.consultation form -->
        </div>
    </div>
@endsection
