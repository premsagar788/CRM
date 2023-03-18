<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Client;
use App\Models\Project;
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
            $project = new Project();
            $project->name       		= $data['name']; 
            $project->client			= $data['client'];
            $project->phone      		= $data['phone'];
            $project->billing_type		= $data['billing_type'];
            $project->status            = $data['status'];
            $project->estimated_time	= $data['estimated_time'];
            $project->start_date     	= $data['start_date'];
            $project->deadline    		= $data['deadline'];
            $project->description 		= $data['description'];
            $project->save();
            return redirect('/admin/projects')->with('success', 'Project added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    public function editProjectView($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.update-project')->with(compact('project'));
    }

    public function editProjectSave(UpdateLeadRequest $request, $id)
    {
        $data = $request->validated();

        $project = Project::findOrFail($id);

        $project->name         = $data['name']; 
        $project->company_name = $data['company_name'];
        $project->source       = $data['source'];
        $project->budget       = $data['budget'];
        $project->website      = $data['website'];
        $project->phone        = $data['phone'];
        $project->country      = $data['country'];
        $project->description  = $data['description'];
        $project->status       = $data['status'];
        $project->save();
        return redirect('/admin/leads')->with('success', 'Project updated successfully!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/admin/projects')->with('success', 'Project deleted successfully!');
    }
}
