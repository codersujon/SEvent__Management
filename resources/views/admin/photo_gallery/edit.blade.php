@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Photo</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_photo_gallery_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_photo_gallery_update', $photo_gallery->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Caption</label>
                                        <input type="text" class="form-control" name="caption" value="{{ old('caption', $photo_gallery->caption) }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Photo *</label>
                                        <div><input type="file"  name="photo" class="form-control"></div>
                                    </div>
                                   
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection