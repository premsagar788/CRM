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
    	$data = $request->all();

        try {
            $lead = new Lead();
            $lead->name       	= $data['name']; 
            $lead->company_name	= $data['company_name'];
            $lead->source      	= $data['source'];
            $lead->status      	= 'Not attempted';
            $lead->budget     	= $data['budget'];
            $lead->website     	= $data['website'];
            $lead->phone      	= $data['phone'];
            $lead->country    	= $data['country'];
            $lead->description 	= $data['description'];
            $lead->save();

            return redirect('/admin/leads')->with('success', 'Lead added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
