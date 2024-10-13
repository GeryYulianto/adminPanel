@extends('layouts.app')

@section('title', 'Create Team')

@section('content')
<h1>Create New Team</h1>
<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Team</button>
</form>
@endsection