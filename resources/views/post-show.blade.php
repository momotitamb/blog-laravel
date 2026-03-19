@php
    /** @var \App\Models\Post $post */
@endphp

@extends('layouts.main')
    
@section('content')      
  
    <div class="post-card">
        <strong>{{ $post->title }}</strong><br><br>

        @if ($post->excerpt)
                {{ $post->excerpt }}<br><br>
        @endif
        
        {{ $post->content }}<br><br>
        <small>Автор: {{ $post->user->name }}</small><br>

        @if ($post->tags->isNotEmpty())
            <div class="tags-list">
                @foreach ($post->tags as $tag)
                    <span class="tag">{{ $tag->name }}</span>
                @endforeach            
            </div>
        @endif
        <br>
        <a href="/posts" class="btn btn-primary">Назад к постам</a>
        <a href="/users/{{ $post->user->id }}/posts" class="btn btn-primary">Все посты автора</a>
    </div>

@endsection