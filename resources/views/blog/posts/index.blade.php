@extends('layouts.app')

@section('content')
@foreach($items as $item)
<div class="post">
    <h1>{{ $item->title  }}</h1>
{{--    <h3>{{ $item->intro  }}</h3>--}}
{{--    <p>{{ $item->body  }}</p>--}}

</div>
    @endforeach
@endsection