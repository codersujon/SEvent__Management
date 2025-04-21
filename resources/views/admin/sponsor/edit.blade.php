@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Sponsor</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_sponsor_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_sponsor_update', $sponsor->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Existing Logo *</label>
                                                <img src="{{ asset('uploads/'.$sponsor->logo)}}" alt="" class="h_100">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Changed Logo</label>
                                                <input type="file"  name="logo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Existing Featured photo *</label>
                                                <img src="{{ asset('uploads/'.$sponsor->featured_photo)}}" alt="" class="h_100">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Changed photo *</label>
                                                <input type="file"  name="featured_photo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Select Sponsor Category *</label>
                                                <select name="sponsor_category_id" class="form-select">
                                                    @foreach($sponsor_categories as $sponsor_category)
                                                        <option value="{{ $sponsor_category->id }}" @if($sponsor_category->id == $sponsor->sponsor_category_id) selected @endif>{{ $sponsor_category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $sponsor->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ $sponsor->slug }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Tagline *</label>
                                                <input type="text" class="form-control" name="tagline" value="{{ $sponsor->tagline }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" id="description" class="form-control h_100 editor" >{{ $sponsor->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ $sponsor->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ $sponsor->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $sponsor->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Website</label>
                                                <input type="text" class="form-control" name="website" value="{{ $sponsor->website }}">
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" value="{{ $sponsor->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" value="{{ $sponsor->twitter }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Linkedin</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{ $sponsor->linkedin }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Instagram</label>
                                                <input type="text" class="form-control" name="instagram" value="{{ $sponsor->instagram }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Map (Iframe Code)</label>
                                            <textarea name="map" id="map" class="form-control h_100" cols="30" rows="10">{{ $sponsor->map }}</textarea>
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