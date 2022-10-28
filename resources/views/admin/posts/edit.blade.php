@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="display-6 text-center">Edit your Post ✏️</h1>
        </div>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
            <label for="floatingInput">Title</label>
            <input name="title" type="text" value="{{ old('title', $post->title) }}" class="form-control @error('title') border border-danger animate__animated animate__headShake @enderror" id="floatingInput" placeholder="Your Post Title">
            @error('title')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="form-grouo">

            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="cover" id="cover" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="post_cover">Choose file</label>
            </div>
        
            @error('cover')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <select name="category_id" id="category" class="form-select mb-3">
            <option value="">--no category--</option>
            @foreach ($categories as $c)
                <option  value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach 
        </select>

        <div class="form-group ">

            <label class="d-block" for="tags[]">Edit Tags:</label>
            @foreach ($tags as $t)
                <div class="form-check d-inline mr-2">
                    <input class="form-check-input" type="checkbox" name="tags[]" @if(in_array( $t->id , old('tags', $post->tags->pluck('id')->all()))) checked @endif value="{{$t->id}}" id="tag-{{ $t->id }}">
                    <label class="form-check-label" for="tag-{{ $t->id }}">
                        {{ ucfirst($t->name)}}
                    </label>

                    @error('tags')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            @endforeach
        </div>
                

        <div class="form-floating mb-3">
            <div class="form-floating">
                <label for="floatingTextarea2">Content goes here</label>
                <textarea class="form-control @error('content') border border-danger animate__animated animate__headShake @enderror" name="content" placeholder="Contet here" id="floatingTextarea2" style="height: 100px">

                    {{ (old( trim('content'), $post->content )) }}

                </textarea>

            @error('content')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">

                <input style="width: 100%" class="btn btn-primary" type="submit" value="Edit Post">

            </div>
        </div>
    </form>

</div>
@endsection