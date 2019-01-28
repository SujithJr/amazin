<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Projects $projects)
    {
        $projects = Projects::where('owner_id', auth()->id())->get();
        // dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        // return redirect('/projects');
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $project = Projects::create($attributes);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $project)
    {
        // $project = Projects::findOrFail($id);
        // dd($projects);
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $project)
    {
        // $project->title = request('title');
        // $project->description = request('description');
        // $projects = $project->save();
        $project->update(request(['title', 'description']));
        return redirect('/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $project)
    {
        $project->delete();
        return redirect('/projects');
    }

    protected function validateProject() {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}
