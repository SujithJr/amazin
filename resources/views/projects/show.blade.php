@extends('layouts.app')

@section('content')

    <div class="c-show-proj">
        <a href="/projects" class="btn-link inline-block mb-4">< Back</a>
        <h2 class="flex items-center justify-between">Project<a href="/projects/{{ $project->id }}/edit" class="btn btn-primary text-white">Edit Project</a></h2>
        <hr>
        <button type="button" class="btn btn-info btn-sm mb-8 text-white task-button" data-toggle="modal" data-target="#exampleModalCenter">Add Task
        </button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title flex items-center justify-between" id="exampleModalCenterTitle">Create your task!
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <form action="/projects/{{ $project->id }}/tasks" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <textarea name="description" cols="30" rows="10" class="form-control resize-none" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Create" class="btn btn-success">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-card-proj">
            <h4>Title: {{ $project->title }}</h4>
            <p class="text-2xl">Description: {{ $project->description }}</p>
        </div>
        <hr>
        <h2>Tasks</h2>
        <hr>
        @if ($project->tasks->count())
            @foreach ($project->tasks as $task)
                <div>
                    <h4>
                        <form class="flex items-center" action="/tasks/{{ $task->id }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="checkbox" name="completed" id="checkbox_{{ $task->id }}" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }} required>
                            <label class="checkbox ml-4 {{ $task->completed ? 'line-through' : '' }}" for="checkbox_{{ $task->id }}">
                                <a href="/projects/{{ $task->project_id }}/tasks/{{ $task->id }}">{{ $task->title }}</a>
                            </label>
                            <div class="form-group hidden">
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="basic-addon1" value="{{ $task->title }}" placeholder="Enter Title">
                            </div>
                            <div class="form-group hidden">
                                <textarea class="form-control resize-none" cols="30" rows="10" name="description" aria-describedby="basic-addon1" placeholder="Enter Description">{{ $task->description }}</textarea>
                            </div>
                        </form>
                    </h4>
                </div>
                <hr>
            @endforeach
        @else
            <p>No task has been created!</p>
        @endif
    </div>

@endsection
