<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\AddProjectRequest;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = Project::all();
    	return view('admin.projects')->with(compact('projects'));
    }

    public function addProject()
    {
    	$clients = Client::select('name', 'id')->get();
    	return view('admin.addproject')->with(compact('clients'));
    }

    public function addProjectSave(AddProjectRequest $request)
    {
    	$data = $request->validated();

        try {
            $lead = new Project();
            $lead->name       		= $data['name']; 
            $lead->client			= $data['client'];
            $lead->phone      		= $data['phone'];
            $lead->billing_type		= $data['billing_type'];
            $lead->status       	= $data['status'];
            $lead->estimated_time	= $data['estimated_time'];
            $lead->start_date     	= $data['start_date'];
            $lead->deadline    		= $data['deadline'];
            $lead->description 		= $data['description'];
            $lead->save();
            return redirect('/admin/projects')->with('success', 'Project added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
