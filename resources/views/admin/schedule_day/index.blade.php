@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Schedule Days</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_schedule_day_create') }}" class="btn btn-primary">Add New</a>
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
                                                    <th>Day</th>
                                                    <th>Date</th>
                                                    <th>Order</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedule_days as $schedule_day)
                                                <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $schedule_day->day }}</td>
                                                   <td>{{ $schedule_day->date1 }}</td>
                                                   <td>{{ $schedule_day->order1 }}</td>
                                                   <td>
                                                        <a href="{{ route('admin_schedule_day_edit', $schedule_day->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_schedule_day_delete', $schedule_day->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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