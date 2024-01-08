@extends('Frontend.master')
@section('content')
<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>HR Consultation Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- service-block -->
            @foreach ($services as $item)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="service-block">
                    <div class="service-img"><a href="#"><img src="{{ url('/uploads//' . $item->service_image) }}"
                                alt="" class="h-[127px]"></a>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><a href="#" class="title">{{ $item->service_name }}</a>
                        </h3>
                        <p>{{ $item->description }}</p>
                        <a href="{{ route('services.details',$item->id) }}">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /.service-block -->
        </div>
    </div>
</div>
@endsection