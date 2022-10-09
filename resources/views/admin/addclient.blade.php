@extends('admin.layout')

@section('title', 'Add Clients')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Client</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Clients add form start -->
        <div class="card shadow mb-4 pt-5 pb-5 pl-2 pr-2 bg-light">
            <div class="col col-lg-12 col-md-12 col-sm-12">
                <form method="post" action="{{ url('/admin/clients/add') }}">
                    @csrf
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control" name="name" placeholder="Enter client name">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Website</label>
                                <input type="text" class="form-control form-control" name="website" placeholder="Enter website">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="number" class="form-control form-control" name="phone" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control form-control" name="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Street</label>
                                <input type="text" class="form-control form-control" name="street" placeholder="Enter street">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">City</label>
                                <input type="text" class="form-control form-control" name="city" placeholder="Enter city" >
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">State</label>
                                <input type="text" class="form-control form-control" name="state" placeholder="Enter state" >
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Country</label>
                                <input type="text" class="form-control form-control" name="country" placeholder="Enter country">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Clients add form end -->
    </div>
@endsection