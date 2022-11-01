@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <figure class="profile_pic_container w-50 flex-shrink-0 ">
                    <img style="aspect-ratio:1" class="img-fluid embed-responsive embed-responsive-1by1 border border-dark rounded-circle" src="{{ $user->profile_pic ? $user->profile_pic : asset('storage/uploads/user-solid.svg') }}" alt="">
                </figure>
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <ul class="user_info">
                    <li class="mb-3">
                        Name: {{$user->name}}
                    </li>
                    <li class="mb-3">
                        Email: {{$user->email}}
                    </li>
                    <li class="mb-3">
                        Member since: {{$user->create_date}}
                    </li>
                    <li class="mb-3">
                        Last Update: {{$user->update_date}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="edit_button d-flex justify-content-end">
            <a href="{{route('admin.user.edit', $user)}}">
                <button type="button" class="btn btn-primary">Edit Data</button>
            </a>
        </div>
    </div>

@endsection