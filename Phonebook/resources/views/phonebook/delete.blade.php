@extends('layouts/layout')

@section('title')Удаление контакта@endsection

@section('main_content')

<div class="container">
    <h1>Delete Contact</h1>

    <form action="{{ route('phonebook.destroy', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <p>Вы уверены, что хотите удалить контакт? <strong>{{ $user->name }}</strong>?</p>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Delete Contact</button>
            <a href="{{ route('book') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection