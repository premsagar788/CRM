<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\AddClientRequest;

class ClientsController extends Controller
{
    public function index()
    {
    	$clients = Client::all();
    	return view('admin.clients')->with(compact('clients'));
    }

    public function addClient()
    {
    	return view('admin.addclient');
    }

    public function addClientSave(AddClientRequest $request)
    {
    	$data = $request->validated();

        try {
            $client = new Client();
            $client->name       = $data['name']; 
            $client->website    = $data['website'];
            $client->phone      = $data['phone'];
            $client->email      = $data['email'];
            $client->street     = $data['street'];
            $client->city       = $data['city'];
            $client->state      = $data['state'];
            $client->country    = $data['country'];
            $client->save();
            return redirect('/admin/clients')->with('success', 'Client added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

}
