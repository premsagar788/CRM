<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Client;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$leads = Lead::all();
    	$clients = Client::all();
        return view('admin.dashboard')->with(compact('leads', 'clients'));
    }
}
