@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center text-primary">
            Edit your profile
        </h1>

                <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input  type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') border border-danger @enderror" id="name" placeholder="Edit your name">

                        @error('name')
                            <p class="text-danger" >
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') border border-danger @enderror" id="email" placeholder="Edit email">

                        @error('email')
                            <p class="text-danger" >
                                {{$message}}
                            </p>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control @error('password') border border-danger @enderror" id="password" placeholder="Edit Password">

                        @error('password')
                            <p class="text-danger" >
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="profile_pic">Profile Picture</label>
                        <input type="file" name="profile_pic" class="form-control @error('profile_pic') border border-danger @enderror"  id="profile_pic" placeholder="Edit your profile pic">

                        @error('profile_pic')
                            <p class="text-danger" >
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" value="Edit Profile" >
                </form>
    </div>
@endsection