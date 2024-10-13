@extends('layouts.app')

@section('title', 'Teams')

@section('content')
<h1>Teams</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Add New Team</a>
<form action="{{ route('teams.index') }}" method="GET" class="form-inline">
    <input type="text" name="search" placeholder="Search team" class="d-inline" required>
    <button type="submit" class="btn btn-success">Search</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{ $team->name }}</td>
            <td>{{ $team->city }}</td>
            <td>
                <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection