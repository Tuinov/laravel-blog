@extends('layouts.appStar')

@section('content')




    <div class="post">
        <h1>{{ $post->title  }}</h1>
        <h3>{{ $post->intro  }}</h3>
        <p>{{ $post->body  }}</p>

    </div>



@endsection
