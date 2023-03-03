@extends('layouts/layout')

@section('title')Создание контакта@endsection

@section('main_content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

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


<div class="container">
    <h1 class="display-4 fst-italic">Форма создания контакта:</h1>

    <form action="{{ route('phonebook.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Contact</button>
            <a href="{{ route('book') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection