<div class="border border-dark">
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3 ">
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="logo p-3">
                    <a href="index.html"><img style="" src="{{ asset('assests/image/logo.jpeg') }}" alt=""> </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                <!-- navigations-->
                <div class="navigation">
                    <div>
                        <ul class="d-flex justify-content-end gap-4 fw-bold ">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            {{-- <li><a href="{{ route('jobList') }}">Job List</a></li> --}}
                            <li><a href="{{ route('client.list') }}">Client List</a></li>
                            <li><a href="{{ route('contacts') }}">Contact Us</a>
                            <li><a href="{{ route('aboutUs') }}">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.navigations-->
            </div>
            {{-- <div class="col-lg-3 hidden-md col-sm-6 hidden-xs pull-right">
                <a href="#" class="btn btn-outline head-btn">Request A Consultation</a>
            </div> --}}
        </div>
    </div>
</div>