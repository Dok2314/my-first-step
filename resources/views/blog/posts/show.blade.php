@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Просмотр поста <strong>"{{ $post->title }}</strong>"</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-4 mt-5">
                <div class="card" style="width: 25rem;">
                    <div class="card-header">
                        <h2 class="card-title">
                            {{ $post->title }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ $post->description }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text">
                            Создан: {{ $post->created_at->toDateTimeString() }}
                        </p>
                        <hr>
                        <p class="card-text">
                            Последнее обновление: {{ $post->updated_at->toDateTimeString() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
