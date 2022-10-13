@extends('admin.layout')

@section('title', 'Add Project')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Project</h1>
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
                                <label for="name">Client</label>
                                <input type="text" class="form-control form-control" name="client" placeholder="Enter company name">
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
                                <label for="name">Billing type</label>
                                <select name="billing_type" class="form-control">
                                    <option value="Fixed Rate">Fixed Rate</option>
                                    <option value="Project Hours">Project Hours</option>
                                    <option value="Task Hours">Task Hours</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="On Hold">On Hold</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Finished">Finished</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="estimated_time">Estimated Time</label>
                                <input type="text" class="form-control form-control" name="estimated_time" placeholder="Enter estimated time (in days)">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control form-control" name="start_date" placeholder="Enter start date" >
                            </div>
                        </div>
                        
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="date" class="form-control form-control" name="deadline" placeholder="Enter deadline" >
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control form-control" name="description" placeholder="Enter description"></textarea>
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