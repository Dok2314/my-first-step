@extends('layouts.app')

@section('title', 'Коментарии')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Коментарии поста
                    <strong>
                        {{ $post->title }}
                    </strong>
                </h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('comments.create', $post) }}">
                    <button class="btn btn-warning">
                        Оставить новый коментарий?
                    </button>
                </a>
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
            <th scope="col">Коментарий</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Создан</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <th scope="row">{{ $comment->id }}</th>
                <td>{{ $comment->title }}</td>
                <td>{{ $comment->description }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $comments->links('vendor.pagination.bootstrap-4') }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
