@extends('layouts/layout')

@section('title')Про нас@endsection

@section('main_content')


<div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
        <marquee direction="left">
            <h1 class="display-4 fst-italic">Телефонная книжка</h1>
        </marquee>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>

    </div>
</div>

<div class="container">

    <h1>Phonebook</h1>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('phonebook.create') }}" class="btn btn-primary" >Add Contact</a>
    </div>


</div>

<div class="col-md-12 mb-2">
    @if(count($users))
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                <td>
                    <a href="{{ route('phonebook.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Изменить</a>
                    <form action="{{ route('phonebook.delete', ['id' => $user->id]) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите навсегда удалить контакт?')">Удалить</button>
                    </form>
                </td>
                @endforeach
        </table>

    </div>

</div>




{{ $users->appends(['s'=>request()->s])->links('pagination::bootstrap-4') }}

@else
<div class="col-md-10 px-0">
    <h1 class="display-4 fst-italic">Записей не найдено . . . :(</h1>
</div>

@endif


@endsection