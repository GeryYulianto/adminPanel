@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Welcome to the NBA App</h1>
    <p class="lead">Explore teams and players in the NBA.</p>
    <hr class="my-4">
    <p>Get started by checking out our teams or players.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('teams.index') }}" role="button">View Teams</a>
    <a class="btn btn-secondary btn-lg" href="{{ route('players.index') }}" role="button">View Players</a>
</div>
@endsection