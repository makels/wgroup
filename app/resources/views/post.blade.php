@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card post-single">
                    <div class="card-header"><a href="{{ route('blog') }}">{{ __('Back') }}</a></div>
                    <div class="card-body">
                        <div class="row">
                            @if(!empty($post->image))
                                <div class="col-5">
                                    <img src="/upload/{{ $post->image }}">
                                </div>
                                <div class="col-7">
                                    <h3>{{ $post->title }}</h3>
                                    <span class="post-short-info">
                                        {{ date('d M Y H:i', strtotime($post->updated_at)) }}&nbsp;{{ __("Author") }}: {{ $post->author->name }}
                                    </span>
                                </div>
                            @else
                                <div class="col-12 text-body">
                                    <h3>{{ $post->title }}</h3>
                                    <span class="post-short-info">
                                        {{ date('d M Y H:i', strtotime($post->updated_at)) }}&nbsp;{{ __("Author") }}: {{ $post->author->name }}
                                    </span>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-body">
                                    {!!  $post->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
