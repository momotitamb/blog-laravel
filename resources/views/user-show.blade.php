@extends('layouts.main')
    
@section('content')  

    <h2>Имя: {{ $user->name }}</h2>
    <h3>Email: {{ $user->email }}</h3>
    @if ($user->bio)
        О себе: {{ $user->bio }}<br><br>
    @endif
    Постов: {{ $user->posts->count() }}
    <a href="/users/{{ $user->id }}/posts" class="btn btn-warning">Все посты автора</a>
    <p>Создан: {{ $user->created_at }}</p>
    <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Назад к списку</a>

@endsection