<?php

namespace App\Http\Controllers;

use App\Models\Project_management;
use Illuminate\Http\Request;

class ProjectManagementController extends Controller
{
    public function index()
    {
        $projects = Project_management::latest()->paginate(5);
        return view('index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'person' => 'required',
            'begin' => 'required',
            'end' => 'required',
        ]);

        Project_management::create(array_merge($request->all(), ['status' => 'active']));

        return redirect()->route('ProjectManagement.index')
            ->with('success', 'Project created successfully.');
    }

    public function show($id)
    {
        $project = Project_management::findOrFail($id);
        return view('show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project_management::findOrFail($id);
        return view('edit', compact('project'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'person' => 'required',
            'begin' => 'required',
            'end' => 'required',
        ]);

        $project = Project_management::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('ProjectManagement.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project_management::findOrFail($id);
        $project->status = $project->status === 'active' ? 'deleted' : 'active';
        $project->save();

        return redirect()->route('ProjectManagement.index')
            ->with('success', 'Project status changed.');
    }
}
