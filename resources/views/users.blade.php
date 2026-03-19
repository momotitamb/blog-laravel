@extends('layouts.main')
    
@section('content')

    <form method="GET" action="/users">
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Найти</button>
        @if (request('search'))
            <a href="/users" class="btn btn-danger">Сбросить</a>
        @endif
    </form>

    <h1>Все пользователи</h1>

    <div style="margin-bottom: 20px;">
        <a href="/users/create" class="btn btn-success">Создать пользователя</a>
    </div>

    @forelse ($users as $user)
    
        <div class="post-card" id="user-{{ $user->id }}">
            <strong>{{ $user->name }}</strong><br><br>
            {{ $user->email }}<br><br>
            @if ($user->bio)
                О себе: {{ $user->bio }}<br><br>
            @endif
            Постов: {{ $user->posts->count() }}<br><br>
            <a href="/users/{{ $user->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="/users/{{ $user->id }}" style="display:inline" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method("DELETE")
                <!-- @method("DELETE") преобразовывает POST в DELETE -->
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    @empty
        @if (request('search'))
            <p>По запросу "{{ request('search') }}" ничего не найдено</p>
        @else
            <p>Пользователей пока нет</p>
        @endif
    @endforelse

@endsection