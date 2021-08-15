<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::orderByDesc('updated_at')->get()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        Client::create($this->validatedClientData());

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client)
    {
        $client->update($this->validatedClientData());

        return redirect()->route('clients.index');
    }

    private function validatedClientData()
    {
        return request()->validate([
            'company' => 'required|string',
            'vat' => 'required|string',
            'country' => 'required|string|size:2',
            'postal_code' => ['required', 'regex:/[\d]{6}/i'],
            'city' => 'required|string',
            'street' => 'required|string',
        ]);
    }
}
