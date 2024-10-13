@extends('layouts.app')

@section('title', $team->name)

@section('content')
<h1>{{ $team->name }}</h1>
<p><strong>City:</strong> {{ $team->city }}</p>
<h2>Players</h2>
<ul>
    @foreach($team->players as $player)
    <li>{{ $player->name }}</li>
    @endforeach
</ul>
<a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">Edit Team</a>
<a href="{{ route('teams.index') }}" class="btn btn-secondary">Back to Teams</a>
@endsection