<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password | Fashion</title>
    <link rel="icon" href="/front/images/favicon.png" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
    type="text/css">
    <link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="/css/sweetalert.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
</head>
<body class="login-container">
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content">
                    <form method="post" action="{{ route('admin.forgotPasswordCheck') }}">
                        {{ csrf_field() }}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div align="center"><img src="/front/images/logo.png" alt="Fashion" class="img-responsive" style="height: auto;width: 50%;" /></div>
                                <h5 class="content-group">Login to your account
                                    <small class="display-block">Enter your credentials below</small>
                                </h5>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off" required value="{{ old('email') }}">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                                @if($errors->get('email'))
                                @foreach($errors->get('email') as $error)
                                <span style="color: red;">{{$error}}</span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit <i
                                    class="icon-circle-right2 position-right"></i></button><br>
                                    <a href="{{ route('admin.login') }}" class="pull-right">Login</a>
                                </div>
                            </div>
                        </form>
                        <div class="footer text-muted text-center">
                            &copy; {{ date('Y') }}. <a href="/">Fashion Web App Kit</a> by <a href="javascript:void(0)" target="_blank">Fashion. </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            @if(Session::has('error'))
            swal("Oops...", "{{ Session::get('error') }}", "error");
            @endif
            @if(Session::has('success'))
            swal("Success !!!.", "{{ Session::get('success') }}", "success");
            @endif
        </script>
    </body>
    </html>