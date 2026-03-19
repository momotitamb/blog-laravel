@extends('layouts.main')
    
@section('content') 

    <h1>Посты пользователя: {{ $user->name }}</h1>
    @foreach ($posts as $post)
    <div class="post-card">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <small>Создан: {{ $post->created_at }}</small><br>
    </div>
    @endforeach
    <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Назад к пользователям</a>
    <a href="/posts" class="btn btn-primary">Назад к постам</a>

@endsection