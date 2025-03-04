@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Speakers</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_speaker_create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table id="example1" class="table table-bordered">
                                        <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($speakers as $speaker)
                                                <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>
                                                        <img src="{{ asset('uploads/'.$speaker->photo ) }}" alt="{{ $speaker->name }}" class="w_100">
                                                   </td>
                                                   <td>{{ $speaker->name }}</td>
                                                   <td>{{ $speaker->designation }}</td>
                                                   <td>
                                                        <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                   </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection