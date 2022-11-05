@extends('layouts.app')

@section('title', 'Главная')

@section('content_header')
    <h1>Главная</h1>
@stop

@include('includes.success')

@section('content')
    <p>Привет</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> </script>
@stop
