@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>Event Schedule</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Schedule</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div id="schedule-section" class="gray pt_50 pb_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 schedule-tab">
                    <ul id="scheduleTab" class="nav nav-tabs justify-content-center text-center">
                        @foreach($schedule_days as $schedule_day)
                            <li class="nav-item">
                                <a href="#" data-target="#target{{ $loop->iteration }}" data-toggle="tab" class="nav-link @if($loop->iteration == 1) active @endif">
                                    <p>{{  $schedule_day->day }}</p>
                                    <span>{{  $schedule_day->date1 }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
    
                    <div id="scheduleTabContent" class="tab-content">

                        @foreach($schedule_days as $schedule_day)
                        <div id="target{{ $loop->iteration }}" class="tab-pane @if($loop->iteration == 1) active show @endif fade">
                            <div class="row speaker-mainbox">
                                <div class="col-lg-4 col-xs-12">
                                    <div class="speaker-img">
                                        <img src="images/day1_session1.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xs-12">
                                    <div class="speaker-box">
                                        <h2>Session 1</h2>
                                        <h3>Introduction to PHP and Laravel</h3>
                                        <p>
                                            Join our experts, John Smith and Pat Flynn, as they guide you through the fundamentals of PHP and how it integrates with Laravel to build robust web applications. Perfect for beginners and those looking to enhance their web development skills.
                                        </p>
                                        <h3>Speakers:</h3>
                                        <h4> 
                                            <a href="speaker.html" class="badge badge-primary">John Smith</a> 
                                            <a href="speaker.html" class="badge badge-primary">Pat Flynn</a>
                                        </h4>
                                        <h3>Location:</h3>
                                        <h4> 
                                            <span>Tim Center (3rd Floor), 34, Park Street, NYC, USA</span>
                                        </h4>
                                        <h3>Time:</h3>
                                        <h4> 
                                            <span>09:00 AM - 09:45 AM</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row speaker-mainbox">
                                <div class="col-lg-4 col-xs-12">
                                    <div class="speaker-img">
                                        <img src="images/day1_session2.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xs-12">
                                    <div class="speaker-box">
                                        <h2>Session 2</h2>
                                        <h3>Advanced SEO Technique</h3>
                                        <p>
                                            Discover advanced SEO strategies with Robin Hood, a seasoned SEO expert, to improve your website's visibility and ranking on search engines. This session is ideal for professionals looking to stay ahead in the competitive digital landscape.
                                        </p>
                                        <h3>Speakers:</h3>
                                        <h4> 
                                            <a href="speaker.html" class="badge badge-primary">Robin Hood</a> 
                                        </h4>
                                        <h3>Location:</h3>
                                        <h4> 
                                            <span>Tim Center (3rd Floor), 34, Park Street, NYC, USA</span>
                                        </h4>
                                        <h3>Time:</h3>
                                        <h4> 
                                            <span>10:00 AM - 10:30 AM</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection