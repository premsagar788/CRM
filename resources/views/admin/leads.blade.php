@extends('admin.layout')

@section('title', 'Leads')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Leads</h1>
            <a href="{{ url('admin/leads/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Lead
            </a>
        </div>

        @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <!-- Clients list -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Source</th>
                                <th>Budget</th>
                                <th>Website</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->company_name }}</td>
                                <td>{{ $lead->source }}</td>
                                <td>{{ $lead->budget }}</td>
                                <td>{{ $lead->website }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->country }}</td>
                                <td>{{ $lead->description }}</td>
                                <td>{{ $lead->status }}</td>
                                <td>
                                    <a href="{{ url('/admin/clients/edit/'.$lead->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('/admin/clients/delete/'.$lead->id) }}" class="btn btn-danger">Delete</a>
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