@extends('front.layout.master')

@section('main_content')
    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>Photo Gallery</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Photo Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="gallery-section" class="pt_50 pb_50 gray projects">
        <div class="container">
            <div class="row gallery_item">

                @foreach($video_galleries as $video_gallery)
                <div class="col-lg-4 col-sm-6 col-xs-12 main-gallery">
                        <div class="project-single">
                            <div class="project-inner">
                                <div class="project-head">
                                    <img src="http://img.youtube.com/vi/{{ $video_gallery->video }}/0.jpg" alt="#">
                                </div>
                                <div class="project-bottom">
                                    <h4>{{ $video_gallery->caption }}</h4>
                                </div>
                                <div class="button">
                                    <a class="video-button btn" href="https://www.youtube.com/watch?v={{ $video_gallery->video }}"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
               @endforeach
                <div class="col-md-12 d-flex justify-content-end">
                    {{ $video_galleries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

