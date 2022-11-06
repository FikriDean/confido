@extends('layouts.main')

@section('container')
{{-- 
  @foreach ($posts as $post)
    <div class="py-5 text-center">
      <h2>{{ $post->body }}</h2>

      @foreach ($users as $user)
        @if ($post->user_id == $user->id)
          <p class="lead">{{ $user->name }}</p>
        @endif
      @endforeach
      

      
    </div>
  @endforeach --}}
    
    @foreach ($posts as $post)
      <h1>{{ $post->title }}</h1>
      
      <ul>
        @foreach ($post->tags as $tag)
          <li>
            {{ $tag->name }}
          </li>
        @endforeach
      </ul>
      
    @endforeach
    
  

@endsection