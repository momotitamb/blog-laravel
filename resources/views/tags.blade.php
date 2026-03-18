<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Теги</title>
</head>
<body>
    <nav class="nav">
        <a href="/posts" class="{{ request()->is('posts*') ? 'nav-active' : '' }}">Посты</a>
        <a href="/users" class="{{ request()->is('users*') ? 'nav-active' : '' }}">Пользователи</a>
        <a href="/categories" class="{{ request()->is('categories*') ? 'nav-active' : '' }}">Категории</a>
        <a href="/tags" class="{{ request()->is('tags*') ? 'nav-active' : '' }}">Теги</a>
    </nav>

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

    <h1>Все теги</h1>

    <div style="margin-bottom: 20px;">
        <a href="/tags/create" class="btn btn-success">Создать тег</a>
    </div>

    @forelse ($tags as $tag)
        <div class="post-card" id="{{ $tag->id }}">
            <strong>{{ $tag->name }}</strong><br><br>

            <a href="/tags/{{ $tag->id }}/edit" class="btn btn-warning">Редактировать</a>

            <form method="POST" action="/tags/{{ $tag->id }}" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    
    @empty
        <p>Тегов пока нет</p>
    @endforelse
</body>
</html>