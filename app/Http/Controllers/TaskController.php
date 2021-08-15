<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('project_id')
            ->orderBy('completed_at')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required|string',
            'project_id' => 'required|numeric|exists:projects,id',
            'description' => 'required|string'
        ]);

        Task::create($validatedData);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}
