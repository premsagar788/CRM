@extends('admin.layout')

@section('title', 'Update Project')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Project</h1>
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

        @if(isset($project))
        <!-- Clients add form start -->
        <div class="card shadow mb-4 pt-5 pb-5 pl-2 pr-2 bg-light">
            <div class="col col-lg-12 col-md-12 col-sm-12">
                <form method="post" action="{{ url('/admin/leads/update/'.$project->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control" name="name" placeholder="Enter client name" value="{{ $project->name }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control form-control" name="company_name" placeholder="Enter company name" value="{{ $project->company_name }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="source">Source</label>
                                <input type="text" class="form-control form-control" name="source" placeholder="Enter source" value="{{ $project->source }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="budget">Budget</label>
                                <input type="text" class="form-control form-control" name="budget" placeholder="Enter budget" value="{{ $project->budget }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control form-control" name="website" placeholder="Enter website" value="{{ $project->website }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control form-control" name="phone" placeholder="Enter phone number" value="{{ $project->phone }}">
                            </div>
                        </div>

                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control form-control" name="country" placeholder="Enter country" value="{{ $project->country }}">
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control form-control" name="description" placeholder="Enter description" value="{{ $project->description }}">
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="{{ $project->status }}" disabled="">{{ $project->status }}</option>
                                    <option value="New Opportunity">New Opportunity</option>
                                    <option value="Interested">Interested</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Contacted">Contacted</option>
                                    <option value="Attempted">Attempted</option>
                                </select>
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
        @endif
    </div>
@endsection