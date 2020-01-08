@extends('layout.master')
@section('title','Register')

@section('content')
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
                 @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                 @endif
                    
                        {{ csrf_field() }}

                        <div class="form-group" style="width: 500x; height: 200px; ">
                            <div class="custom-file">
                            <label for="name" class="col-md-4 control-label">Profile picture</label>
                                <div style="background-color: lightgrey;width:150px; height:150px;">
                                    <div id="image_preview"></div>
                                    <input type="file" class="custom-file-input" id="uploadFile" name="ImageForUser" style="width: 150px; height: 150px; "/> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="inputState" type="text" class="form-control" name="name" required autofocus>

                                <!-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="inputState" type="text" class="form-control" name="phone" required autofocus>

                                <!-- @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="inputState" type="email" class="form-control" name="email"required>

                                <!-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="radio" id="inputState">
                                <label><input type="radio" name="gender" value="Male">Male</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="gender" value="Female">Female</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="inputState" type="password" class="form-control" name="password" required>

                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="inputState" type="password" class="form-control" name="password_confirm" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
