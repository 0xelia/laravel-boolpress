@component('mail::message')
# New Post Added!

Yay! New Post correctly added in ypur blog! 
@component('mail::button', ['url' => route('admin.posts.show', $post)])
{{ $post->title }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent