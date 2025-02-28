@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front')}}/images/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>Dashboard</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                    <h4 class="mb_15 fw600">User Detail:</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name: </th>
                                <td>Mister Smith</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>smith@gmail.com</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>237-453-2264</td>
                            </tr>
                            <tr>
                                <th>Address: </th>
                                <td>45 Sp Valley, NYC, USA</td>
                            </tr>
                            <tr>
                                <th>State: </th>
                                <td>NYC</td>
                            </tr>
                            <tr>
                                <th>City: </th>
                                <td>NYC</td>
                            </tr>
                            <tr>
                                <th>Country: </th>
                                <td>USA</td>
                            </tr>
                            <tr>
                                <th>Zip Code: </th>
                                <td>12873</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection