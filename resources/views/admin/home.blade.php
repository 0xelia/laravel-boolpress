@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>
                    Hi, {{ Auth::user()->name }}!
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection
