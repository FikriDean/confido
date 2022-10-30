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
    
    @foreach ($tags as $tag)
      <h1>{{ $tag->name }}</h1>
      
      <ul>
        @foreach ($tag->posts as $post)
          <li>
            {{ $post->title }}
          </li>
        @endforeach
      </ul>
      
    @endforeach
    
  

@endsection