@extends('layouts.main')
    
@section('content')  

    <h1>Все категории</h1>

    <div style="margin-bottom: 20px;">
        <a href="/categories/create" class="btn btn-success">Создать категорию</a>
    </div>

    @forelse ($categories as $category)
        <div class="post-card" id="category-{{ $category->id }}">
            <strong>{{ $category->name }}</strong><br><br>

            {{-- Показываем description только если он есть --}}
            @if ($category->description)
                {{ $category->description }}<br><br>
            @endif

            <a href="/categories/{{ $category->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Редактировать</a>

            <form method="POST" action="/categories/{{ $category->id }}" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    
    @empty
        <p>Категорий пока нет</p>
    @endforelse

@endsection