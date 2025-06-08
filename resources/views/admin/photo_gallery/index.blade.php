@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Photo Galleries</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_photo_gallery_create') }}" class="btn btn-primary">Add New</a>
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
                                                    <th>Caption</th>
                                                    <th>Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($photo_galleries as $photo_gallery)
                                                <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $photo_gallery->caption }}</td>
                                                   <td>
                                                        <img src="{{ asset('uploads/'.$photo_gallery->photo ) }}" alt="{{ $photo_gallery->caption }}" class="w_200">
                                                   </td>
                                                   <td>
                                                        <a href="{{ route('admin_photo_gallery_edit', $photo_gallery->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_photo_gallery_delete', $photo_gallery->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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