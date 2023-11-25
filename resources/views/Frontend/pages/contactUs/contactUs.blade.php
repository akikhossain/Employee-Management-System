@extends('Frontend.master')
@section('content')

<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <!-- consultation form -->
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                <h2 class="text-center mb40">HR Consulting Services from Us</h2>
                <div class="consultantion-form">
                    <h3 class="mb30 text-center">Request A Consultation </h3>
                    <form>
                        <div class="row">
                            <div class=" ">
                                <div class=" ">
                                    {{-- <label class="" for="name"> First Name</label> --}}
                                    <input type="text" placeholder="First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">

                                    <input required placeholder="Enter Notice title" type="text" id="form11Example1"
                                        name="notice_title" class="form-control" />
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
            </div>
        </div>
    </div>
</div>
<!-- /.consultation form -->
@endsection