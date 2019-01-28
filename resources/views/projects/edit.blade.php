@extends('layouts.app')

@section('content')

    <div class="c-edit-form-proj">
        <a href="/projects/{{ $project->id }}" class="btn-link inline-block mb-4">< Back</a>
        <div class="flex items-center justify-between">
            <h2>Edit project</h2>
            <form action="/projects/{{ $project->id }}" method="POST" class="mt-8">
                @method('DELETE')
                @csrf
                <div>
                    <input type="submit" value="Delete Project" class="btn btn-danger">
                </div>
            </form>
        </div>
        <hr>
        <form action="/projects/{{ $project->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter Title" value="{{ $project->title }}">
            </div>
            <div class="form-group">
                <textarea name="description" placeholder="Enter Description" class="form-control resize-none" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>
            <div>
                <input type="submit" value="Update Project" class="btn btn-success mt-8">
            </div>
        </form>
    </div>

@endsection
