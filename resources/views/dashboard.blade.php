@extends('layouts.app')

@section('content')

<div class="c-main">
    <h2 class="text-center">Dashboard</h2>
    <hr>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <h2 class="text-center">You are very lucky, you're logged in!</h2>
</div>

@endsection
