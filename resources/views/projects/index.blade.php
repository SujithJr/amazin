@extends('layouts.app')

@section('content')

    <h2 class="flex items-center justify-between">Projects Page<a href="/projects/create" class="btn btn-danger inline-block">Create Project</a></h2>
    <hr>
    <div class="c-proj">
        @foreach ($projects as $project)
            <div class="c-wrap">
                <h5 class="m-0"><a href="/projects/{{ $project->id }}" class="c-wrap__link py-3 px-4 no-underline block">{{ $project->title }}</a></h5>
                <hr>
            </div>
        @endforeach
    </div>

@endsection
