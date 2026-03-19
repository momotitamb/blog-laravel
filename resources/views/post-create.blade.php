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
    
    <h2>Создать пост</h2>

    <form method="POST" action="/posts">
        @csrf                
        <label>Категория:</label>
        <select name="category_id">
            <option value="">Без категории</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                    {{ $category->name }}
                </option>         
            @endforeach

        </select>   
        
        <label>Заголовок:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>    

        <div class="tags-block">
            <label>Теги:</label>
            @foreach ($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    {{ $tag->name }} <br>
                </label>
            @endforeach
        </div>

        <label>Краткое описание:</label>
        <textarea name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>

        <label>Содержание:</label>
        <textarea name="content" id="content" required>{{ old('content') }}</textarea>    
    
        <label>Автор:</label>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : ''}}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>        
        <a href="/posts" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection