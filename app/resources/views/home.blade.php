@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card posts-list">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <a href="{{ route('front_post', $post->id) }}">
                            <div class="row post-short">
                                <div class="col-3">
                                    @if(!empty($post->image))
                                        <img src="/upload/{{ $post->image }}">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <h5>{{ $post->title }}</h5>
                                    <span class="post-short-info">
                                        {{ date('d M Y H:i', strtotime($post->updated_at)) }}&nbsp;{{ __("Author") }}: {{ $post->author->name }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
