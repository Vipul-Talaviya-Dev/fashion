<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login panel | Fashion</title>
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
                    <form method="post" action="{{ route('admin.check') }}">
                        {{ csrf_field() }}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <!-- <a class="navbar-brand" href="{{ route('admin.login') }}">
                                    <img src="/front/images/logo.png" alt="Fashion" class="img-responsive" style="height: 50px;" />
                                </a> -->
                                
                                <div align="center"><img src="/front/images/logo.png" alt="Fashion" class="img-responsive" style="height: auto;width: 50%;" /></div>
                                <h5 class="content-group">Login to your account
                                    <small class="display-block">Enter your credentials below</small>
                                </h5>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                                @if($errors->get('email'))
                                @foreach($errors->get('email') as $error)
                                <span style="color: red;">{{$error}}</span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                @if($errors->get('password'))
                                @foreach($errors->get('password') as $error)
                                <span style="color: red;">{{$error}}</span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                    class="icon-circle-right2 position-right"></i></button>
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
            @if(Session::has('message'))
            swal("Oops...", "{{ Session::get('message') }}", "error");
            @endif
        </script>
    </body>
    </html>