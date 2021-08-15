<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        $validatedData = request()->validate([
            'company' => 'required|string',
            'vat' => 'required|string',
            'country' => 'required|string|size:2',
            'postal_code' => ['required', 'regex:/[\d]{6}/i'],
            'city' => 'required|string',
            'street' => 'required|string',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index');
    }
}
