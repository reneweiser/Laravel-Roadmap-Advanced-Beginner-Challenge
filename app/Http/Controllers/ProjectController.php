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
        Project::create($this->validatedProjectData());

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $users = User::select(['id', 'name'])->get();
        $clients = Client::select(['id', 'company'])->get();
        $status = Status::all();

        return view('projects.edit', compact('project', 'users', 'clients', 'status'));
    }

    public function update(Project $project)
    {
        $project->update($this->validatedProjectData());

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }

    private function validatedProjectData()
    {
        return request()->validate([
            'title' => 'required|string',
            'description' => 'string|nullable',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status_id' => 'required|exists:status,id',
        ]);
    }
}
