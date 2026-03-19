@extends('layouts.main')
    
@section('content')  

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Редактировать: {{ $category->name }}</h2>
    
    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method('PUT')
        
        <label>Название:</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required>

        <label>Описание:</label>
        <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
        
        <a href="/categories" class="btn btn-primary">Отмена</a>

        <button type="submit" class="btn btn-success">Сохранить</button><br>
    </form>

@endsection