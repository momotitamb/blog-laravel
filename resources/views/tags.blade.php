@extends('layouts.main')
    
@section('content')  

    <h1>Все теги</h1>

    <div style="margin-bottom: 20px;">
        <a href="/tags/create" class="btn btn-success">Создать тег</a>
    </div>

    @forelse ($tags as $tag)
        <div class="post-card" id="tag-{{ $tag->id }}">
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

@endsection