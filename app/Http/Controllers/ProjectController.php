<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateProjectRequest;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('admin.project.index', [
            'projects' => Project::paginate(15),
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.project.createOrEdit');
    }

    public function store(CreateOrUpdateProjectRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());

        session()->flash('message', 'Project created successfully');

        return redirect()->route('admin.projects.edit', ['project' => $project]);
    }

    public function edit(Project $project): Factory|View|Application
    {
        return view('admin.project.createOrEdit', [
            'project' => $project,
        ]);
    }

    public function update(CreateOrUpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        session()->flash('message', 'Project updated successfully');

        return back();
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        session()->flash('message', 'Project deleted successfully');

        return back();
    }
}
