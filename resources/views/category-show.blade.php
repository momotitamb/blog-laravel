@extends('layouts.main')
    
@section('content')  

    <div class="post-card">
        <strong>{{ $category->name }}</strong><br><br>

        @if ($category->description)
            {{ $category->description }}<br><br>
        @endif

        <a href="/categories#category-{{ $category->id }}" class="btn btn-primary">Назад к категориям</a>
    </div>

@endsection