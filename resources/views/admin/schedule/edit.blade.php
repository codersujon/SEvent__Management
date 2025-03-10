@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Schedule</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_schedule_index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_schedule_update', $schedule->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$schedule->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Photo</label>
                                        <img src="" alt="" class="w_100_p">
                                        <div>
                                            <input type="file"  name="photo">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $schedule->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title" value="{{ $schedule->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Schedule Day *</label>
                                                <select class="form-control" name="schedule_day_id">
                                                    @foreach($schedule_days as $schedule_day)
                                                        <option value="{{ $schedule_day->id }}" @if($schedule_day->id == $schedule->schedule_day_id ) selected @endif>{{ $schedule_day->day }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                   
                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" id="description" class="form-control editor h_200" cols="30" rows="10">{{ $schedule->description }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Location *</label>
                                                <input type="text" class="form-control" name="location" value="{{ $schedule->location }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Time *</label>
                                                <input type="text" class="form-control" name="time" value="{{ $schedule->time }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Order *</label>
                                                <input type="text" class="form-control" name="item_order" value="{{ $schedule->item_order }}">
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