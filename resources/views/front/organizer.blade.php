@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>{{ $organizer->name }}</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('organizers') }}">Organizers</a></li>
                                <li class="breadcrumb-item active">{{ $organizer->name }}</li>
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
                        <img src="{{ asset('uploads/'.$organizer->photo) }}">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <div class="speaker-detail">
                        <h2>{{ $organizer->name }}</h2>
                        <h4 class="mb_20">{{ $organizer->designation }}</h4>
                        <p>
                            {!! nl2br($organizer->biography) !!}
                        </p>
                        
    
                        <h4>More Information</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    @if($organizer->address != "")
                                        <tr>
                                            <th><b>Address:</b></th>
                                            <td>{{ $organizer->address }}</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th><b>Email:</b></th>
                                        <td>{{ $organizer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Phone:</b></th>
                                        <td>{{ $organizer->phone }}</td>
                                    </tr>

                                    @if($organizer->facebook != "" || $organizer->twitter != "" || $organizer->linkedin != "" || $organizer->instagram != "")
                                    <tr>
                                        <th><b>Social:</b></th>
                                        <td>
                                            <ul class="social-icon">

                                                @if($organizer->facebook != "")
                                                <li>
                                                    <a href="{{ $organizer->facebook }}"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                @endif

                                                @if($organizer->twitter != "")
                                                <li>
                                                    <a href="{{ $organizer->twitter }}"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                @endif

                                                @if($organizer->linkedin != "")
                                                <li>
                                                    <a href="{{ $organizer->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                                @endif

                                                @if($organizer->instagram != "")
                                                <li>
                                                    <a href="{{ $organizer->instagram }}"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                @endif

                                            </ul>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection