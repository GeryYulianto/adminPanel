@extends('layouts.app')

@section('title', $player->name)

@section('content')
<h1>{{ $player->name }}</h1>
<p><strong>Team:</strong> {{ $player->team->name }}</p>
<p><strong>Points:</strong> {{ $player->points }}</p>
<p><strong>Rebounds:</strong> {{ $player->rebounds }}</p>
<p><strong>Assists:</strong> {{ $player->assists }}</p>
<a href="{{ route('players.edit', $player) }}" class="btn btn-warning">Edit Player</a>
<a href="{{ route('players.index') }}" class="btn btn-secondary">Back to Players</a>
@endsection