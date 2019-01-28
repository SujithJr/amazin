<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Projects;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // public $sample = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Projects $project)
    {
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);
        $project->addTask($attributes);
        // return $project;
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $project, Tasks $task)
    {
        return view('tasks.index', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $task)
    {
        // $task->update(request(['title', 'completed']));
        // return request();
        $task->update([
            'title' => request()->title,
            'description' => request()->description,
        ]);
        request()->has('completed') ? $task->complete() : $task->incomplete();
        return redirect('/projects/' . $task->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect('/projects/' . $task->project_id);
    }
}
