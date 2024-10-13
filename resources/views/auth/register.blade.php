@extends('app')

@section('title', 'Register')

@section('content')
<h1>Create New Admin</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<form method="POST" action="{{ route('auth.store') }}">
    @csrf
    
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        @error('username')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">password:</label>
        <input type="password" id="password" name="password" required></input>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Create Admin</button>
@endsection