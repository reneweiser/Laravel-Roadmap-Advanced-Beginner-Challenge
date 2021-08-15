<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskCompletionController extends Controller
{
    public function update(Task $task_completion)
    {
        $task_completion->complete();

        return back()->withMessage("You completed the task \"$task_completion->name\"!");
    }

    public function destroy(Task $task_completion)
    {
        $task_completion->reopen();

        return back()->withMessage("You reopened the task \"$task_completion->name\"!");
    }
}
