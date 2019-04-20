<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Fashion</title>
    <link rel="icon" href="/front/images/favicon.png" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="/css/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="/assests/css/datepicker/bootstrap-datepicker3.css"/>
    @yield('css')
    <style type="text/css">
        .navbar-brand {
            height: 70px;
        }
        .navbar-brand > img {
            height: 50px;
        }
    </style>
</head>

<body>
<style>
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    .isa_info, .isa_success, .isa_warning, .isa_error {
        margin: 10px 0px;
        padding: 12px;

    }

    .isa_info {
        color: #00529B;
        background-color: #BDE5F8;
    }

    .isa_success {
        color: #4F8A10;
        background-color: #DFF2BF;
    }

    .isa_warning {
        color: #9F6000;
        background-color: #FEEFB3;
    }

    .isa_error {
        color: #D8000C;
        background-color: #FFBABA;
    }

    .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
        margin: 10px 22px;
        font-size: 2em;
        vertical-align: middle;
    }
</style>

@include('admin.layouts.header')
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        @include('admin.layouts.side-bar')
        <div class="content-wrapper">
        @yield('page-header')
        <!-- Content area -->
            <div class="content">
            @yield('content')

            @include('admin.layouts.footer')
            <!-- /content area -->
            </div>

        </div>

    </div>
</div>
<!-- Core JS files -->
<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="/js/sweetalert.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/datepicker/bootstrap-datepicker.min.js"></script>
@yield('js')
<script type="text/javascript">
    @if(Session::has('error'))
    swal("Oops...", "{{ Session::get('error') }}", "error");
    @endif
    @if(Session::has('success'))
    swal("Success !!!.", "{{ Session::get('success') }}", "success");
    @endif
</script>
</body>
</html>
