@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>{{ $speaker->name }}</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('speakers') }}">Speakers</a></li>
                                <li class="breadcrumb-item active">{{ $speaker->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div id="speakers" class="pt_70 pb_70 white team speakers-item">
            <div class="container">
        
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="speaker-detail-img">
                            <img src="{{ asset('uploads/'.$speaker->photo) }}">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <div class="speaker-detail">
                            <h2>{{ $speaker->name }}</h2>
                            <h4 class="mb_20">{{ $speaker->designation }}</h4>
                            <p>
                                {!! nl2br($speaker->biography) !!}
                            </p>
                           
        
                            <h4>More Information</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    @if($speaker->address != "")
                                        <tr>
                                            <th><b>Address:</b></th>
                                            <td>{{ $speaker->address }}</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th><b>Email:</b></th>
                                        <td>{{ $speaker->email }}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Phone:</b></th>
                                        <td>{{ $speaker->phone }}</td>
                                    </tr>
                                    @if($speaker->website != "")
                                        <tr>
                                            <th><b>Website:</b></th>
                                            <td>
                                                <a href="{{ $speaker->website }}" target="_blank">{{ $speaker->website }}</a>
                                            </td>
                                        </tr>
                                    @endif

                                    @if($speaker->facebook != "" || $speaker->twitter != "" || $speaker->linkedin != "" || $speaker->instagram != "")
                                    <tr>
                                        <th><b>Social:</b></th>
                                        <td>
                                            <ul class="social-icon">

                                                @if($speaker->facebook != "")
                                                <li>
                                                    <a href="{{ $speaker->facebook }}"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                @endif

                                                @if($speaker->twitter != "")
                                                <li>
                                                    <a href="{{ $speaker->twitter }}"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                @endif

                                                @if($speaker->linkedin != "")
                                                <li>
                                                    <a href="{{ $speaker->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                                @endif

                                                @if($speaker->instagram != "")
                                                <li>
                                                    <a href="{{ $speaker->instagram }}"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                @endif

                                            </ul>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
        
                            <h4>My Sessions</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="speaker-img">
                                        <img src="{{ asset('dist-front/images/day1_session1.jpg') }}">
                                    </div>
                                    <div class="speaker-box">
                                        <h3>Introduction to PHP and Laravel</h3> 
                                        <h4> 
                                            <span>Tim Center, 34, Park Street, NYC, USA</span><br>
                                            <span>Sep 20, 2024 (Day 1)</span><br>
                                            <span>09:00 AM - 09:45 AM</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="speaker-img">
                                        <img src="{{ asset('dist-front/images/day3_session1.jpg') }}">
                                    </div>
                                    <div class="speaker-box">
                                        <h3>User Experience (UX) Design Principles</h3> 
                                        <h4> 
                                            <span>Tim Center, 34, Park Street, NYC, USA</span><br>
                                            <span>Sep 22, 2024 (Day 3)</span><br>
                                            <span>10:00 AM - 10:30 AM</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
@endsection