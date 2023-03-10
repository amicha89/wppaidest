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
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/font-awesome/css/font-awesome.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/dist/css/styles.css') }}">

</head>

<body class="hold-transition login-page" style="background-color:#ececec;">
<div class="login-box">
    <div class="login-logo">
        @if (!empty(settings('logo')) && file_exists(public_path('images/logos/' . settings('logo'))))
            <a href="{{ url(\Config::get('adminPrefix').'/') }}"><img src="{{ url('public/images/logos/' . settings('logo')) }}" class="img-responsive log-img" alt="Logo"/></a>
        @else
            <img src="{{ url('public/uploads/userPic/default-logo.jpg') }}" width="288" height="90">
        @endif
    </div><!-- /.login-logo -->

    <div class="login-box-body login-design">

        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class') }} text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        <div class="alert alert-danger text-center" id="error_message_div" style="margin-bottom:0px;display:none;" role="alert">
            <p><a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a></p>
            <p id="error_message"></p>
        </div>
        <!-- /.Flash Message  -->

        <form action="{{ url(\Config::get('adminPrefix').'/forget-password') }}" method="post" id="forget-password-form">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label sr-only" for="inputSuccess2">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-theme btn-block" id="admin-forget-password-submit-btn">
                        <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                        <span id="admin-forget-password-submit-btn-text" style="font-weight: bolder;">Submit</span>
                    </button>
                </div>
                <div class="col-xs-2">
                </div>
                <div class="col-xs-5">
                    <a href="{{url(\Config::get('adminPrefix').'')}}" class="btn btn-theme btn-block">Back To Login</a><br>
                </div>
            </div>
        </form>
    <!-- /.social-auth-links -->
        {{-- <a href="{{url('/admin')}}">Already have an account</a><br>
        <a href="javascript:void(0)" class="text-center">Register a new membership</a> --}}
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('public/backend/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('public/backend/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- jquery.validate -->
<script src="{{ asset('public/dist/js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script>
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
            email: {
                required: true,
                email: true,
            },
        },
        submitHandler: function(form)
        {
            $("#admin-forget-password-submit-btn").attr("disabled", true).click(function (e)
            {
                e.preventDefault();
            });
            $(".fa-spin").show();
            $("#admin-forget-password-submit-btn-text").text("Submitting..");
            form.submit();
        }
    });
</script>
</body>
