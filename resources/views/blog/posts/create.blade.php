@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Создание поста</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form method="post" class="form-group">
            @csrf
            @method('POST')
            @include('includes.errors')
            <div class="form-group">
                <label for="">Название</label>
                <input name="title" type="text" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="">Пост</label>
                <textarea name="description" type="text" class="form-control">{{ old('description') }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-success">Создать</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
