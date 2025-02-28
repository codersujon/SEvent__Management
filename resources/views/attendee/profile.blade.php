@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>Profile</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-section pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="user-sidebar">
                            <div class="card">
                                @include('front.layout.sidebar')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Existing Photo:</label>
                                <div>
                                    <img src="{{ asset('dist-front') }}/images/attendee.jpg" alt="" class="w_150">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Change Photo:</label>
                                <div>
                                    <input type="file" name="photo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Name *</label>
                                        <input type="text" class="form-control" name="" value="Mister Smith">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email *</label>
                                        <input type="text" class="form-control" name="" value="smith@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phone *</label>
                                        <input type="text" class="form-control" name="" value="123-333-2222">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Address *</label>
                                        <input type="text" class="form-control" name="" value="45, Street Road">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Country *</label>
                                        <input type="text" class="form-control" name="" value="USA">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">State *</label>
                                        <input type="text" class="form-control" name="" value="NYC">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">City *</label>
                                        <input type="text" class="form-control" name="" value="NYC">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Zip Code *</label>
                                        <input type="text" class="form-control" name="" value="23455">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

   
@endsection