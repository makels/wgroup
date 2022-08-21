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
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __("Posts List") }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @include("admin.layouts.posts_filter")
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table style="width:100%;" class="table table-bordered" id="posts_table">
                                <thead>
                                <tr>
                                    <th>{{ __("Id") }}</th>
                                    @if(auth()->user()->role !== App\Models\User::WRITER)
                                        <th>{{ __("Author") }}</th>
                                    @endif
                                    <th>{{ __("Post Title") }}</th>
                                    <th filter_id="post_type_filter_id">{{ __("Type") }}</th>
                                    <th filter_id="post_status_filter_id">{{ __("Status") }}</th>
                                    <th width="100">{{ __("Date") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $posts as $i => $row )
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        @if(auth()->user()->role !== App\Models\User::WRITER)
                                            <td>{{ $row->author->name}}</td>
                                        @endif
                                        <td>
                                            @if(!auth()->user()->inRoles([App\Models\User::ADMIN, App\Models\User::MODERATOR])
                                                && ($row->status == 'PUBLISHED' || $row->status == 'TO_MODERATE'))
                                                @if(strlen($row->title) > 70)
                                                    {{ substr($row->title, 0, 70) }}...
                                                @else
                                                    {{ $row->title }}
                                                @endif
                                            @else
                                            <a href="{{route('post', $row->id)}}" @if($row->block == 1) title="@if(!empty($row->block_reason)){{ $row->block_reason }} @else {{ __('This post has  been blocked') }} @endif" style="color: red;" @endif>
                                                @if(strlen($row->title) > 70)
                                                    {{ substr($row->title, 0, 70) }}...
                                                @else
                                                    {{ $row->title }}
                                                @endif
                                            </a>
                                            @endif
                                        </td>
                                        <td>{{ App\Models\Post::getPostType($row->type) }}</td>
                                        <td>{{ App\Models\Post::getPostStatus($row->status) }}</td>
                                        <td>{{ date('d.m.Y H:i', strtotime($row->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


