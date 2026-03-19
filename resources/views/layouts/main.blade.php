<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Посты</title>
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

    @yield('content')

    </body>
</html>