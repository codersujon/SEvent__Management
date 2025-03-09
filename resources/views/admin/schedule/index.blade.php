@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Schedules</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_schedule_create') }}" class="btn btn-primary">Add New</a>
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
                                                    <th>Title</th>
                                                    <th>Schedule Day</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedules as $schedule)
                                                <tr>
                                                   <td class="text-center">{{ $loop->iteration }}</td>
                                                   <td class="text-center">
                                                        <img src="{{ asset('uploads/'.$schedule->photo ) }}" alt="{{ $schedule->name }}" class="w_200">
                                                   </td>
                                                   <td class="text-center">{{ $schedule->name }}</td>
                                                   <td class="text-center">{{ $schedule->title }}</td>
                                                   <td class="text-center">{{ $schedule->schedule_day->day }}</td>
                                                   <td>
                                                        <a href="{{ route('admin_schedule_edit', $schedule->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_schedule_delete', $schedule->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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