<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
    	$clients = Client::all();
    	return view('admin.clients')->with(compact('clients'));
    }
}
