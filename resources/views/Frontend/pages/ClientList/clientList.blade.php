@extends('Frontend.master')
@section('content')

<div class="space-medium bg-light">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h2>Our clients. We work closely with a wide range of clients from different sectors and
                            regions across public sector, private sector and local and national.</h2>
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
</div>
<!-- /.consultation form -->
@endsection