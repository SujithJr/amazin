@extends('layouts.app')

@section('content')

    <div class="c-task-create">
        <a href="/projects/{{ $task->project_id }}" class="btn-link inline-block mb-4">< Back</a>
        <div class="flex items-center justify-between">
            <h2>Edit Task</h2>
            <form action="/tasks/{{ $task->id }}" method="POST" class="mt-8">
                @method('DELETE')
                @csrf
                <div>
                    <input type="submit" value="Delete Task" class="btn btn-danger">
                </div>
            </form>
        </div>
        <hr>
        <form action="/tasks/{{ $task->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="flex items-center p-1 mb-8 {{ $task->completed ? 'bg-green' : '' }}">
                <input type="checkbox" name="completed" id="checkbox_{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                <label class="checkbox ml-4 {{ $task->completed ? 'text-white' : '' }}" for="checkbox_{{ $task->id }}">Completed</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="basic-addon1" value="{{ $task->title }}" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <textarea class="form-control resize-none" cols="30" rows="10" name="description" aria-describedby="basic-addon1" placeholder="Enter Description">{{ $task->description }}</textarea>
            </div>
            <div>
                <input type="submit" value="Update Task" class="btn btn-success">
            </div>
        </form>
    </div>

@endsection
