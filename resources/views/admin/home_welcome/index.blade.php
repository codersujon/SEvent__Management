@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Welcome Information</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_home_welcome_update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$home_welcome->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Background</label>
                                        <img src="" alt="" class="w_100_p">
                                        <div>
                                            <input type="file"  name="photo">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" class="form-control" name="heading" value="{{ $home_welcome->heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" id="text" cols="30" rows="5" class="form-control h_200" >{{ $home_welcome->description }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Button Text</label>
                                                <input type="text" class="form-control" name="button_text" value="{{ $home_welcome->button_text }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Button Url</label>
                                                <input type="text" class="form-control" name="button_url" value="{{ $home_welcome->button_url }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status" id="status">
                                                    <option value="show" @if($home_welcome->status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($home_welcome->status == 'hide') selected @endif>Hide</option>
                                                </select>
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