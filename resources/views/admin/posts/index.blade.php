@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">

            <div class="nav justify-content-between">
                <h3>
                    Your Posts
                </h3>
                <a href="{{ route('admin.posts.create') }}">
                    <button type="button" class="btn btn-outline-primary btn-sm"> 
                        New Post
                    </button>
                </a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        # 
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Tags
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)

                    <tr>
                        <td>
                            {{ $p['id'] }}
                        </td>
                        <td>
                            <a class="text-reset" href="{{ route('admin.posts.show', $p) }}">
                                {{ $p['title'] }}
                            </a>
                        </td>
                        <td class="text-center">
                            {{ $p->category ? $p->category->name : "-" }}
                        </td>
                        <td>
                            <ul class=" list-unstyled">

                                @forelse ($p->tags as $t)

                                <li class="mr-1 d-inline">
                                    <a href="{{route('admin.tags.show', $t)}}" class="text-reset" >
                                        {{ $t->name }}
                                    </a>
                                </li>
                                    
                                @empty
                                    <p class="text-center">-</p>    
                                @endforelse
                            </ul>
                        </td>
                        <td>
                            {{ $p['slug']}}
                        </td>

                        <td>
                            {{ $p->date }}
                        </td>

                        <td>
                            <div class="row justify-content-end align-items-center mr-0">

                                <a href="{{ route('admin.posts.edit', $p) }}">
                                    <button type="button"  class="btn btn-primary btn-sm mb-1"> 
                                        Edit Post
                                    </button>
                                </a>
    
                                <form action="{{ route('admin.posts.destroy', $p) }}" method="post">

                                    @csrf
                                    @method('DELETE')
                                    
                                    <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete Post">

                                </form>

                            </div>

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection