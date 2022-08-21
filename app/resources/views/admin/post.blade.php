@extends('admin.layouts.admin_app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @include("admin.layouts.content_header")
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __("New Post") }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="post_form" method="post" action="{{ route('save_post') }}">
                            @csrf
                            <input type="hidden" id="post_data_image" name="post_data[image]" value="" />
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputTitle">{{ __('Title') }}<span class="required-label">*</span></label>
                                            <input type="text" class="form-control required" name="post_data[title]" value="{{ $post->title }}" id="inputTitle" placeholder="{{ __('Enter title') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        @include('admin.layouts.post_editor')
                                    </div>
                                    <div class="col-4">
                                        {{-- Post Properties --}}
                                        @include('admin.layouts.post_props')
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-default" onclick="document.location.href='{{ route('posts') }}';">{{ __('Back') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
