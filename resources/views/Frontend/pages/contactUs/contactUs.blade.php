@extends('Frontend.master')
@section('content')

<div class="space-medium bg-light">
    <div class="page-header mb-5">
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10  col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                <div class="contact-form">
                    <h1 class="contact-info-title mb40 ">How Can We Help You?</h1>
                    <div class="row">
                        <form action="{{ route('contactStore') }}" method="post">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="name"></label>
                                    <input id="name" type="text" name="name" placeholder="Name" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="email"></label>
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="phone"></label>
                                    <input id="phone" type="tel" name="phone" placeholder="Phone" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="subject"></label>
                                    <input id="subject" name="subject" type="text" placeholder="Subject"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="message"></label>
                                    <textarea class="form-control pdt20" id="message" name="message" rows="4"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="text-center w-25 mx-auto mt-3">
                                <button type="submit" class="btn btn-success p-2 text-lg  rounded col-md-10">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.contact-form-->
                <!-- contact-info-->
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h2>Our Contact Info</h2>
                            <p class="lead">Thanks for considering our HR services. Feel free to reach out using the
                                tool below, and you'll be able to monitor the progress of your inquiry.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="contact-section">
                            <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="contact-info">
                                <p>4 Embankment Drive Road,Sector-10
                                    Uttara, Dhaka 1230</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="contact-section">
                            <div class="contact-icon"><i class="fa fa-phone"></i></div>
                            <div class="contact-info">
                                <p>+8801701476579
                                    <br>+8801701476579
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="contact-section">
                            <div class="contact-icon  "><i class="fa fa-envelope"></i></div>
                            <div class="contact-info">
                                <p>20103087@iubat.edu
                                    <br>akikhs00@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.contact-info-->
            </div>
        </div>
    </div>
    <!-- /.contact-section -->
    <div class="space-medium">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>Our Locations</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="location-block">
                        <div class="location-content  ">
                            <h3>HRHUB360, Dhaka</h3>
                            <p>1230 Uttara, Dhaka, Bangladesh</p>
                            <ul>
                                <li><span class="location-icon"><i
                                            class="fa fa-phone"></i></span><span>+8801701476579</span></li>
                                <li><span class="location-icon"><i
                                            class="fa fa-envelope"></i></span><span>20103087@iubat.edu</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="location-block">
                        <div class="location-content">
                            <h3>HRHUB360, Sylhet</h3>
                            <p>Srimangal,Moulvibazar District, Bangladesh</p>
                            <ul>
                                <li><span class="location-icon"><i
                                            class="fa fa-phone"></i></span><span>+8801645476579</span></li>
                                <li><span class="location-icon"><i
                                            class="fa fa-envelope"></i></span><span>sylhet@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="location-block">
                        <div class="location-content">
                            <h3>HRHUB360, Chittagong</h3>
                            <p>Pahartali, Chattogram Division, Bangladesh</p>
                            <ul>
                                <li><span class="location-icon"><i
                                            class="fa fa-phone"></i></span><span>+8801445446529</span></li>
                                <li><span class="location-icon"><i
                                            class="fa fa-envelope"></i></span><span>pahartoli@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection