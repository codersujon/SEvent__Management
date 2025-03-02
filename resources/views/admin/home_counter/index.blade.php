@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Counter Information</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_home_counter_update') }}" method="post">
                                    @csrf
                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item1 - Icon *</label>
                                                <input type="text" class="form-control" name="item1_icon" value="{{ $home_counter->item1_icon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item1 - Number *</label>
                                                <input type="text" class="form-control" name="item1_number" value="{{ $home_counter->item1_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item1 - Title *</label>
                                                <input type="text" class="form-control" name="item1_title" value="{{ $home_counter->item1_title }}">
                                            </div>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item2 - Icon *</label>
                                                <input type="text" class="form-control" name="item2_icon" value="{{ $home_counter->item2_icon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item2 - Number *</label>
                                                <input type="text" class="form-control" name="item2_number" value="{{ $home_counter->item2_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item2 - Title *</label>
                                                <input type="text" class="form-control" name="item2_title" value="{{ $home_counter->item2_title }}">
                                            </div>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item3 - Icon *</label>
                                                <input type="text" class="form-control" name="item3_icon" value="{{ $home_counter->item3_icon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item3 - Number *</label>
                                                <input type="text" class="form-control" name="item3_number" value="{{ $home_counter->item3_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item3 - Title *</label>
                                                <input type="text" class="form-control" name="item3_title" value="{{ $home_counter->item3_title }}">
                                            </div>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item4 - Icon *</label>
                                                <input type="text" class="form-control" name="item4_icon" value="{{ $home_counter->item4_icon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item4 - Number *</label>
                                                <input type="text" class="form-control" name="item4_number" value="{{ $home_counter->item4_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Item4 - Title *</label>
                                                <input type="text" class="form-control" name="item4_title" value="{{ $home_counter->item4_title }}">
                                            </div>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status" id="status">
                                                    <option value="show" @if($home_counter->status == 'show') selected @endif>Show</option>
                                                    <option value="hide" @if($home_counter->status == 'hide') selected @endif>Hide</option>
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