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
    <h2>Редактировать: {{ $user->name }}</h2>
    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('PUT')
        
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>О себе:</label>
        <textarea name="bio" id="bio">{{ old('bio', $user->bio) }}</textarea>    
    
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    
        <a href="/users" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection