@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Посты') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @foreach($posts as $post)
                    <div class="card offset-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>
                                    {{ $post->title }}
                                </strong>
                            </h5>
                            <p class="card-text">
                                {{ \Str::limit($post->description, 150, $end='...') }}
                            </p>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('posts.show', $post) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('comments.index', $post) }}">
                                            Коментариев ({{ $post->comments()->count() }})
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="mb-5">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
