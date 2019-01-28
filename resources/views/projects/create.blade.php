@extends('layouts.app')

@section('content')

    <a href="/projects" class="btn-link inline-block mb-4">< Back</a>
    <h2 class="">Create Project</h2>
    <hr>
    <div class="c-create-project-form">
        <form action="/projects" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control resize-none" placeholder="Enter Description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" value="Create" class="btn btn-success">
            </div>
        </form>
    </div>

@endsection
