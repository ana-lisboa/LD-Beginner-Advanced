<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\CreateOrUpdateTaskRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('admin.task.index', [
            'tasks' => Task::paginate(15),
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.task.createOrEdit');
    }

    public function store(CreateOrUpdateTaskRequest $request): RedirectResponse
    {
        $task = Task::create($request->validated());

        session()->flash('message', 'Task created successfully');

        return redirect()->route('admin.tasks.edit', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('admin.task.createOrEdit', [
            'task' => $task,
        ]);
    }

    public function update(CreateOrUpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $task->update(array_merge($request->validated(), [
            'done' => $request->has('done'),
        ]));

        session()->flash('message', 'Task updated successfully');

        return back();
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        session()->flash('message', 'Task deleted successfully');

        return back();
    }
}
