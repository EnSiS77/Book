@extends('layouts/layout')

@section('title')Изменение контакта@endsection

@section('main_content')

<div class="container">
    <h1>Edit Contact</h1>

    <form action="{{ route('phonebook.update', ['id' => $users->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Contact</button>
            <a href="{{ route('book') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection