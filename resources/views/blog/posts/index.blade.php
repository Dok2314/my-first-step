@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Посты</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('posts.create') }}"><button class="btn btn-warning">Создать</button></a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Описание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr style="{{ $post->deleted_at ? 'text-decoration: line-through;' : '' }}">
                    <th scope="row">{{ $post->id }}</th>
                    <td><b>{{ $post->title }}</b></td>
                    <td><b style="color: green;">{{ $post->user->name }}</b></td>
                    <td>{{ \Str::limit($post->description, 150, $end='...') }}</td>
                    <td>
                        @if($post->deleted_at)
                            <form action="{{ route('posts.restore', $post) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="text text-warning"
                                    style="background: none; border: none; position: relative; right: 8px; font-size: 20px;">
                                    <i class="fas fa-trash-restore"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('posts.edit', $post) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <br>
                            <a href="{{ route('posts.show', $post) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('posts.delete', $post) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button
                                    class="fas fa-backspace text-danger"
                                    style="background: none; border: none; position: relative; right: 10px;"
                                >
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
