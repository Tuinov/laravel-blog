@extends('layouts.appStar')

@section('content')
    <div class="row">
    @foreach($posts as $post)

            <div class="col-md-4">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->intro  }}</p>
                <p><a href="/post/{{ $post->id }}" class="btn btn-default">читать далее</a></p>
            </div>

    @endforeach
        </div>
@endsection