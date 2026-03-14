<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Посты</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <form method="GET" action="/posts">
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Найти</button>
        @if (request('search'))
            <a href="/posts" class="btn btn-danger">Сбросить</a>
        @endif
    </form>
    <h1>Все посты:</h1>
    <div style="margin-bottom: 20px;">
        <a href="/posts/create" class="btn btn-success">Создать пост</a>
    </div>
    @forelse ($posts as $post)
        <div class="post-card" id="post-{{ $post->id }}">
            <strong>{{ $post->title }}</strong><br><br>
            @if ($post->excerpt)
                {{ $post->excerpt }}<br><br>
            @endif
            <small>Автор: {{ $post->user->name }}</small><br>
            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    @empty
        @if (request('search'))
            <p>По запросу "{{ request('search') }}" ничего не найдено</p>
        @else
            <p>Постов пока нет</p>
        @endif
    @endforelse
</body>
</html>