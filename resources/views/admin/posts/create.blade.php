@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h1 class="display-6 text-center">Create a New Post 📝</h1>
            </div>
        </div>

        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="post">

            @csrf
    
            <div class="form-floating mb-3">
                <label for="floatingInput">Title</label>
                <input name="title" type="text" value="{{ old('title') }}" class="form-control  @error('title') border border-danger animate__animated animate__headShake @enderror" id="floatingInput" placeholder="Your Post Title">
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

            <div class="form-group">


                <div class="input-group mb-3">
                    <select name="category_id" class="custom-select" id="category_id">
                        <option value="" >-- select category --</option>


                        @foreach ($categories as $c)
                        
                            <option @if(old('category_id') == $c->id) selected  @endif value="{{ $c->id }}">{{ $c->name }}</option>

                            @error('category_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        @endforeach
                    </select>

            </div>

            <div class="form-group ">
                {{-- @dump(old('tags')) --}}
                <label class="d-block" for="tags[]">Select Tags:</label>
                @foreach ($tags as $t)
                    <div class="form-check d-inline mr-2">
                        <input class="form-check-input" type="checkbox" name="tags[]" @if(in_array( $t->id , old('tags', []))) checked @endif value="{{$t->id}}" id="tag-{{ $t->id }}">
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
                    <label for="floatingInput">Content</label>
                    <textarea class="form-control @error('content') border border-danger animate__animated animate__headShake @enderror" name="content" placeholder="Contet here" id="floatingTextarea2" style="height: 100px">

                        {{ old('content') }}

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

                    <input style="width: 100%" class="btn btn-primary" type="submit" value="Create a New Post">

                </div>
            </div>
        </form>

    </div>
@endsection