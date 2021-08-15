<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::orderByDesc('deadline')->get()]);
    }

    public function create()
    {
        $users = User::select(['id', 'name'])->get();
        $clients = Client::select(['id', 'company'])->get();
        $status = Status::all();

        return view('projects.create', compact('users', 'clients', 'status'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'title' => 'required|string',
            'description' => 'string|nullable',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status_id' => 'required|exists:status,id',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index');
    }
}
