@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Organizer</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_organizer_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_organizer_update', $organizer->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $organizer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ $organizer->slug }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Designation *</label>
                                                <input type="text" class="form-control" name="designation" value="{{ $organizer->designation }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ $organizer->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $organizer->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ $organizer->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Biography</label>
                                        <textarea name="biography" id="biography" class="form-control editor h_200" cols="30" rows="10">{{ $organizer->biography }}</textarea>
                                    </div>
                                   
                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$organizer->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Change Photo *</label>
                                        <div><input type="file"  name="photo" class="form-control"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" value="{{ $organizer->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" value="{{ $organizer->twitter }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Linkedin</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{ $organizer->linkedin }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Instagram</label>
                                                <input type="text" class="form-control" name="instagram" value="{{ $organizer->instagram }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
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