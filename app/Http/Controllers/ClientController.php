<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::orderByDesc('updated_at')->get()]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('clients.create', compact('countries'));
    }

    public function store()
    {
        Client::create($this->validatedClientData());

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        $countries = Country::all();

        return view('clients.edit', compact('client', 'countries'));
    }

    public function update(Client $client)
    {
        $client->update($this->validatedClientData());

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }

    private function validatedClientData()
    {
        return request()->validate([
            'company' => 'required|string',
            'vat' => 'required|string',
            'country' => 'required|string|size:2',
            'postal_code' => 'required|string|min:5',
            'city' => 'required|string',
            'street' => 'required|string',
        ]);
    }
}
