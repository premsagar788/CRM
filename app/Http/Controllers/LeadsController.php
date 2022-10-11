<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Requests\AddLeadRequest;

class LeadsController extends Controller
{
    public function index()
    {
    	$leads = Lead::all();
    	return view('admin.leads')->with(compact('leads'));
    }

    public function addLead()
    {
    	return view('admin.addlead');
    }

    public function addLeadSave(AddLeadRequest $request)
    {
    	$data = $request->validated();

        try {
            $lead = new Lead();
            $lead->name       	= $data['name']; 
            $lead->company_name	= $data['company_name'];
            $lead->source      	= $data['source'];
            $lead->budget     	= $data['budget'];
            $lead->website     	= $data['website'];
            $lead->phone      	= $data['phone'];
            $lead->country    	= $data['country'];
            $lead->description 	= $data['description'];
            $lead->status       = $data['status'];
            $lead->save();

            return redirect('/admin/leads')->with('message', 'Lead added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    public function editLeadView($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.update-lead')->with(compact('lead'));
    }

    public function editLeadSave(UpdateClientRequest $request, $id)
    {
        $data = $request->validated();

        $lead = Lead::findOrFail($id);

        $lead->name       = $data['name']; 
        $lead->website    = $data['website'];
        $lead->phone      = $data['phone'];
        $lead->email      = $data['email'];
        $lead->street     = $data['street'];
        $lead->city       = $data['city'];
        $lead->state      = $data['state'];
        $lead->country    = $data['country'];
        $lead->save();
        return redirect('/admin/leads')->with('success', 'Lead updated successfully!');
    }
}
