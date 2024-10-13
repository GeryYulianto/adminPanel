@extends('layouts.app')

@section('title', 'Edit Team')

@section('content')
<h1>Edit Team</h1>
<form action="{{ route('teams.update', $team) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $team->city }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Team</button>
</form>
@endsection