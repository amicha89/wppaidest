<?php
/**
 * Created By: TechVillage.net
 * Start Date: 22-Jan-2018
 */
$logo = settings('logo');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="parvez">
    <title>Admin</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('public/backend/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/backend/iCheck/square/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/dist/css/styles.css') }}">

    <!---favicon-->
    @if (!empty(settings('favicon')))
        <link rel="shortcut icon" href="{{asset('public/images/logos/'.settings('favicon'))}}" />
    @endif

</head>

<body class="hold-transition login-page" style="background-color:#ececec">
<div class="login-box">
    <div class="login-logo">
        @if (!empty(settings('logo')) && file_exists(public_path('images/logos/' . settings('logo'))))
            <a href="{{ url(\Config::get('adminPrefix').'/') }}"><img src="{{ url('public/images/logos/' . settings('logo')) }}" class="img-responsive log-img" alt="Logo"/></a>
        @else
            <img src="{{ url('public/uploads/userPic/default-logo.jpg') }}" width="288" height="90">
        @endif
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Admin Forget Password</p>

        <form action="{{ url(\Config::get('adminPrefix').'/confirm-password') }}" method="post" id="forget-password-form">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('new_password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="New Password" name="new_password">
                <input type="hidden" value="{{@$token}}" name="token">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('new_password'))
                    <span class="help-block"><strong>{{ $errors->first('new_password') }}</strong></span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_new_password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-theme btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('public/backend/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('public/backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- jquery.validate -->
<script src="{{ asset('public/dist/js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

    $.validator.setDefaults({
        highlight: function(element) {
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).parent('div').removeClass('has-error');
        },
    });

    $('#forget-password-form').validate({
        errorClass: "has-error",
        rules: {
            new_password: {
                required: true
            },
            confirm_new_password: {
                required: true
            }
        }
    });

</script>

</body>
