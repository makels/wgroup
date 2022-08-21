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
                    <div class="card">
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
                            <table style="width:100%;" class="table table-bordered" id="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $posts as $i => $row )
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->author_id }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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


