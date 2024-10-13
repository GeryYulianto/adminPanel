@extends('layouts.app')

@section('title', 'Players')

@section('content')
<h1>Players</h1>

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

<a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add New Player</a>
<form action="{{ route('players.index') }}" method="GET" class="form-inline">
    <input type="text" name="search" placeholder="Search player" class="d-inline" required>
    <button type="submit" class="btn btn-success">Search</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Team</th>
            <th>Points</th>
            <th>Rebounds</th>
            <th>Assists</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($players as $player)
        <tr>
            <td>{{ $player->name }}</td>
            <td>{{ $player->team->name }}</td>
            <td>{{ $player->points }}</td>
            <td>{{ $player->rebounds }}</td>
            <td>{{ $player->assists }}</td>
            <td>
                <a href="{{ route('players.show', $player) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('players.destroy', $player) }}" method="POST" class="d-inline">
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