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
                            @csrf

                            <input type="hidden" name="user_data[id]" value="{{ $user->id }}">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="user_data[name]" value="{{ $user->name }}" id="inputName" placeholder="{{ __('Enter name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="selectSex">{{ __('Role') }}</label>
                                    <select class="form-control" id="selectSex" name="user_data[role]">
                                        <option value="0" @if($user->role == 0) selected @endif>{{ __('Member') }}</option>
                                        <option value="1" @if($user->role == 1) selected @endif>{{ __('Administrator') }}</option>
                                        <option value="2" @if($user->role == 2) selected @endif>{{ __('Moderator') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="selectSex">{{ __('Sex') }}</label>
                                    <select class="form-control" id="selectSex" name="user_data[sex]">
                                        <option value="0" @if($user->sex == 0) selected @endif>{{ __('Nevermind') }}</option>
                                        <option value="1" @if($user->sex == 1) selected @endif>{{ __('Male') }}</option>
                                        <option value="2" @if($user->sex == 2) selected @endif>{{ __('Female') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Birthday') }}:</label>
                                    <div class="input-group date" id="birthday" data-target-input="nearest">
                                        <input type="text" value="{{ date('d.m.Y', strtotime($user->birthday)) }}" name="user_data[birthday]" class="form-control datetimepicker-input" data-target="#birthday"/>
                                        <div id="birthday-calendar" class="input-group-append" data-target="#birthday" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputCountry">{{ __('Country') }}</label>
                                    <input type="text" class="form-control" name="user_data[country]" value="{{ $user->country }}" id="inputCountry" placeholder="{{ __('Enter country') }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputCity">{{ __('City') }}</label>
                                    <input type="text" class="form-control" name="user_data[city]" value="{{ $user->city }}" id="inputCity" placeholder="{{ __('Enter city') }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">{{ __('Email address') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="inputEmail" placeholder="{{ __('Enter email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="user_data[password]" id="inputPassword" placeholder="{{ __('Password') }}">
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
