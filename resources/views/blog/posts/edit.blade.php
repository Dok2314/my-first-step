@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Редактирование поста <strong>"{{ $post->title }}</strong>"</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form method="post" class="form-group">
            @method('PATCH')
            @csrf
            <x-adminlte-input
                label="Название"
                name="title"
                :value="old('title', $post->title)"
            />
            <div class="form-group" id="editor">
                <label for="">Пост</label>
                <textarea name="description" type="text" class="form-control">{{ old('description', $post->description) }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ $post->user->id }}">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
