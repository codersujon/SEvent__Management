@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Facility</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_package_facility_update',$package_facility->id ) }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" placeholder="Facility Name" value="{{ old('facility', $package_facility->name) }}">
                                    </div>
                                    <div class="mb-4">
                                        <select name="status" class="form-select">
                                            <option value="1" {{ $package_facility->status == '1' ? 'selected':"" }}>Yes</option>
                                            <option value="0" {{ $package_facility->status == '0' ? 'selected':"" }}>No</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="item_order" placeholder="Order" value="{{ old('item_order', $package_facility->item_order) }}">
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