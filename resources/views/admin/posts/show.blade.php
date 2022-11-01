@extends('layouts.app')

@section('content')
    
    <div class="container">

        <h1 class="display-5">
            {{ $post['title'] }}
        </h1>

        <div class="post_cover">
            <img src="{{ asset('storage/' . $post->cover) }}" alt="">
        </div>

        <p class="mr-2">
            Created at: {{$post->date}}
        </p>

        <p class="mr-2">
            Slug: {{$post->slug}}
        </p>

        @if($post->category)

        <p>
            Category: {{ $post->category->name }}
        </p>

        @endif

        @if($post->tags)
            <ul class="list-unstyled d-flex"><p>Tags:</p>
                @foreach($post->tags as $tag)
                    <a href="{{ route('admin.tags.show', $tag) }}" class="text-reset">
                        <li class="ml-2">
                            {{ $tag->name }}
                        </li>
                    </a>
                @endforeach
            </ul>
        @endif
        <p>
            {{ $post['content'] }}
        </p>

        @if ($post->user['id'] == Auth::id())
            
            <div class="row justify-content-end align-items-center">
                <a href="{{route('admin.posts.edit', $post)}}">
                    <button type="button" style="margin-right: 10px" class="btn btn-primary">Edit Post</button>
                </a>

                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">

                    @csrf
                    @method('DELETE')

                    <input type="submit" class="btn btn-outline-danger" value="Delete Post">

                </form>
            </div>
        @endif

        @if ($post->category)
        <h4 class="display-6">
            Related Posts
        </h4>

            @foreach ($post->category->posts()->where('id', '!=', $post->id)->get() as $relatedPost)
                <ul class="list-unstyled">
                    <li>
                        <a class="text-reset" href="{{ route('admin.posts.show', $relatedPost) }}">
                            {{$relatedPost->title}}
                        </a>
                    </li>
                </ul>

            @endforeach
        @endif
    </div>

@endsection