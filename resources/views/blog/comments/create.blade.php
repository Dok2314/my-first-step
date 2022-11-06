@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Коментарий к посту
                    <strong>
                        {{ $post->title }}
                    </strong>
                </h1>
            </div>
            <div class="col-md-1">
                <a href="{{ url()->previous() }}"><button class="btn btn-dark">Назад</button></a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form method="post" class="form-group">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="editor">Коментарий</label>
                <textarea name="description" id="editor" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-success">Оставить комментарий</button>
        </form>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
