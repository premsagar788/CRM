@extends('admin.layout')

@section('title', 'Clients')

<style type="text/css">
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        float: right;
    }
    div.table-responsive>div.dataTables_wrapper>div.row>div[class^=col-]:last-child {
        padding-right: 0;
    }
    div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
}
.form-control-sm {
    height: calc(1.5em + 0.5rem + 2px);
    padding: 0.25rem 0.5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
}
div.table-responsive>div.dataTables_wrapper>div.row>div[class^=col-]:last-child {
    padding-right: 0.75em;
}
div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}

</style>

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <a href="{{ url('admin/clients/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add Client
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
                                <th>Website</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->website }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->street }}</td>
                                <td>{{ $client->city }}</td>
                                <td>{{ $client->state }}</td>
                                <td>{{ $client->country }}</td>
                                <td>
                                    <a href="{{ url('/admin/clients/edit/'.$client->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('/admin/clients/delete/'.$client->id) }}" class="btn btn-danger">Delete</a>
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