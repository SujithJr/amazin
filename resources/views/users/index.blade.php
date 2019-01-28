@extends('layouts.app')

@section('content')

    <div class="c-users">
        <div class="c-profile mb-20">
            <h3 class="flex items-center justify-between">Profile<a href="#/" class="btn btn-primary btn-sm mb-8" data-toggle="modal" data-target="#exampleModalCenter3">Edit Profile</a></h3>
            <hr>
            <div>
                <p class="mb-4">Your Name: {{ $current_user->name }}</p>
                <p class="mb-4">Your Email: {{ $current_user->email }}</p>
            </div>
            <hr>
        </div>
        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title flex items-center justify-between" id="exampleModalCenterTitle">Update Profile
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <form action="/users/{{ $current_user->id }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name1">Name</label>
                                <input type="text" id="name1" class="form-control" name="name" aria-describedby="basic-addon1" placeholder="Enter Name" value="{{ $current_user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" id="email1" class="form-control" name="email" aria-describedby="basic-addon1" placeholder="Enter Email" value="{{ $current_user->email }}" required>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($users->count())
            <h3>Active Users</h3>
            <hr>
            @foreach ($users as $user)
                <div class="c-user-table">
                    <div><p>Name: {{ $user->name }}</p></div>
                    <div><p>Email: {{ $user->email }}</p></div>
                </div>
                <hr>
            @endforeach
        @endif
    </div>

@endsection
