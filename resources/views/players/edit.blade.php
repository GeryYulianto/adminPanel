@extends('layouts.app')

@section('title', 'Edit Player')

@section('content')
<h1>Edit Player</h1>

<form action="{{ route('players.update', $player) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $player->name }}" required>
    </div>
    <div class="mb-3">
        <label for="team_id" class="form-label">Team</label>
        <select class="form-control" id="team_id" name="team_id" required>
            @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="points" class="form-label">Points</label>
        <input type="number" class="form-control" id="points" name="points" value="{{ $player->points }}" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="rebounds" class="form-label">Rebounds</label>
        <input type="number" class="form-control" id="rebounds" name="rebounds" value="{{ $player->rebounds }}" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="assists" class="form-label">Assists</label>
        <input type="number" class="form-control" id="assists" name="assists" value="{{ $player->assists }}" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Player</button>
</form>
@endsection