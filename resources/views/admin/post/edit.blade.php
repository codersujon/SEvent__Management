@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Post</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_post_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_post_update', $post->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Short Description *</label>
                                        <textarea name="short_description" id="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description', $post->short_description) }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Photo *</label>
                                        <div><input type="file"  name="photo" class="form-control"></div>
                                    </div>

                                     <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" id="description" class="form-control editor h_200" cols="30" rows="10">{{ old('description', $post->description) }}</textarea>
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