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
    
    <h2>Создать тег</h2>

    <form method="POST" action="/tags">
        @csrf                   

        <label>Название:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>        

        <a href="/tags" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>

@endsection