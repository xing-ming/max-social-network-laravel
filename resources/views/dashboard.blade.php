@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('includes.message-block');

    <div class="row new-post">
        <div class="col-md-3"></div>
`       <div class="col-md-6">
            <header><h3>What do your have to say</h3></header>
            <form action="{{ route('users.post') }}" method="post">
                @csrf
                @method('POST')
                
                <div class="form-group">
                    <textarea id="new-post" class="form-control" name="body" 
                    rows="5" placeholder="Your Post"></textarea>
                </div>

                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        </div>
    </div>

    <section class="row posts">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <header><h3>What other post say...</h3></header>
            @foreach ($posts as $post)
                <article class="post">
                    {{-- @if (Auth::user() == $post->user) --}}
                    <p>{{ $post->body }}</p>
                    <div class="info">Post by {{ $post->user->first_name }} on {{ $post->created_at }}</div>
                    
                    <div class="interaction">
                            
                            <a href="" class="like">Like</a> | 
                            <a href="" class="like">Dislike</a> |
                        
                        
                        {{-- @endif --}}
                        @if (Auth::user() == $post->user)
                            <a href="" class="edit">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- <script
  src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous">
  </script> --}}

    <script>
        let token = '{{ Session::token() }}';
        let urlLike = '{{ route('like') }}';
    </script>
@endsection