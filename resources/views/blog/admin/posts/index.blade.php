@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <a class="btn btn-primary" href="{{ route('blog.admin.post.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>#</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $post)
                                @php /**@var \App\Models\BlogPost $post */ @endphp
                                <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>{{ $post->category_id }}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.post.edit', $post->id) }}">{{ $post->title }}</a>
                                    </td>
                                    <td>{{ date('d M H:i', strtotime($post->published_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--        {{ $paginator->links() }}--}}
    </div>

@endsection