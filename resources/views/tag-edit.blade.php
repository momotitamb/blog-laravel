<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Редактировать тег</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Редактировать: {{ $tag->name }}</h2>
    
    <form method="POST" action="/tags/{{ $tag->id }}">
        @csrf
        @method('PUT')
        
        <label>Название:</label>
        <input type="text" name="name" value="{{ old('name', $tag->name) }}" required>
        
        <a href="/tags" class="btn btn-primary">Отмена</a>

        <button type="submit" class="btn btn-success">Сохранить</button><br>
    </form>
    
</body>
</html>