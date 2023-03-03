@extends('layouts/layout')

@section('title')Отзывы@endsection

@section('main_content')

<div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
        <marquee direction="right">
            <h1 class="display-4 fst-italic">Отзывы на нас</h1>
        </marquee>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>

    </div>
</div>

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

<form method="post" action="/review/check" class="mb-5">

    @csrf
    <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
    <input type="text" name="subject" id="subject" placeholder="Введите тему" class="form-control"><br>
    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Введите отзыв"></textarea><br>
    <button type="submit" class="btn btn-success">Отправить</button>

</form>
<br>
<h1 class="pb-2 border-bottom mb-3">Все отзывы:</h1>

@foreach($reviews as $el)

<div class="alert alert-warning">
    <h3>{{ $el->subject }}</h3>
    <b>{{ $el->email }}</b>
    <p>{{ $el->message }}</p>
</div>

@endforeach

@endsection