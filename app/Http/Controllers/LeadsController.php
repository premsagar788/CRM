<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Lead;
use App\Http\Requests\AddLeadRequest;
use App\Http\Requests\UpdateLeadRequest;

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

            return redirect('/admin/leads')->with('success', 'Lead added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    public function editLeadView($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.update-lead')->with(compact('lead'));
    }

    public function editLeadSave(UpdateLeadRequest $request, $id)
    {
        $data = $request->validated();

        $lead = Lead::findOrFail($id);

        $lead->name         = $data['name']; 
        $lead->company_name = $data['company_name'];
        $lead->source       = $data['source'];
        $lead->budget       = $data['budget'];
        $lead->website      = $data['website'];
        $lead->phone        = $data['phone'];
        $lead->country      = $data['country'];
        $lead->description  = $data['description'];
        $lead->status       = $data['status'];
        $lead->save();
        return redirect('/admin/leads')->with('success', 'Lead updated successfully!');
    }

    public function deleteLead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect('/admin/leads')->with('success', 'Lead deleted successfully!');
    }



    
}
