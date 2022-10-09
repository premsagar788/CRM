@extends('admin.layout')

@section('title', 'Add Clients')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Lead</h1>
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

        <!-- Add Lead form start -->
        <div class="card shadow mb-4 pt-5 pb-5 pl-2 pr-2 bg-light">
            <div class="col col-lg-12 col-md-12 col-sm-12">
                <form method="post" action="{{ url('/admin/leads/add') }}">
                    @csrf
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control" name="name" placeholder="Enter lead name">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control form-control" name="company_name" placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Source</label>
                                <input type="text" class="form-control form-control" name="source" placeholder="Enter source">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Budget</label>
                                <input type="text" class="form-control form-control" name="budget" placeholder="Enter budget">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Website</label>
                                <input type="text" class="form-control form-control" name="website" placeholder="Enter website" >
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
                                <label for="name">Country</label>
                                <input type="text" class="form-control form-control" name="country" placeholder="Enter country">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control form-control" name="description" placeholder="Enter description">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="New Opportunity">New Opportunity</option>
                                    <option value="Interested">Interested</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Contacted">Contacted</option>
                                    <option value="Attempted">Attempted</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Lead form end -->
    </div>
@endsection