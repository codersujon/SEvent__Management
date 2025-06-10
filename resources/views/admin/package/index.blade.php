@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Packages</h1>
                <div class="section-header-button ">
                    <a href="{{ route('admin_package_create') }}" class="btn btn-primary">Add New</a>
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
                                                    <th>Package Name</th>
                                                    <th>Price</th>
                                                    <th>Maximum Tickets</th>
                                                    <th>Order</th>
                                                    <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($packages as $package)
                                                <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $package->name }}</td>
                                                   <td>{{ $package->price }}</td>
                                                   <td>{{ $package->maximum_tickets }}</td>
                                                   <td>{{ $package->item_order }}</td>
                                                   <td>
                                                        <a href="{{ route('admin_package_edit', $package->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_package_delete', $package->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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