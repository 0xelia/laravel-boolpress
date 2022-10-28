@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="display-4 text-primary mb-4">
                    {{ $tag->name }}
                </h2>
            </div>
        </div>

        <div class="row">
            @foreach ($tag->posts as $post)
                <div class="col-lg-4 col-sm-6 col-12 d-flex flex-column flex-grow-1">
                    <div class="card flex-grow-1 mb-4">
                        <a href="{{route('admin.posts.show', $post) }}" class="text-reset">
                            <div class="card-title p-3">
                                <h5 class="m-0">
                                            {{ $post->title }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    Created at: {{ $post->created_at }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection