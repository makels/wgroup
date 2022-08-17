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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $user->name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('save_user') }}">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" id="inputName" placeholder="{{ __('Enter name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">{{ __('Email address') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" id="inputEmail" placeholder="{{ __('Enter email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="{{ __('Password') }}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-default" onclick="document.location.href='{{ route('users') }}';">{{ __('Back') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
