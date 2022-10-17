@extends('admin.layout')

@section('title', 'Projects')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Projects</h1>
            <a href="{{ url('admin/projects/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Project
            </a>
        </div>

        @if (Session::has('success'))
           <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif

        <!-- Clients list -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Client</th>
                                <th>Phone</th>
                                <th>Billing Type</th>
                                <th>status</th>
                                <th>Estimated Time</th>
                                <th>Start Date</th>
                                <th>Deadline</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->client }}</td>
                                <td>{{ $project->phone }}</td>
                                <td>{{ $project->billing_type }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->estimated_time }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->deadline }}</td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    <a href="{{ url('/admin/projects/edit/'.$project->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('/admin/projects/delete/'.$project->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Clients list end -->
    </div>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection