@extends('admin.layouts.main')
@section('title', 'Reset Password')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Reset Password</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h1 class="panel-title">Reset Password</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="panel-body">
                                <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.changePassword') }}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="size" autocomplete="off" class="form-control" placeholder="Enter Password">
                                                @foreach($errors->get('password') as $error)
                                                    <span style="color: red;display: inline-block;">{{$error}}</span>
                                                @endforeach
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="confirmPassword" autocomplete="off" class="form-control" placeholder="Enter Confirm Password">
                                                @foreach($errors->get('confirmPassword') as $error)
                                                    <span style="color: red;">{{$error}}</span>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-md-offset-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                <p><br></p>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--vfsdf--}}
        </div>
        <!-- /traffic sources -->
    <!-- /content area -->

@endsection
@section('js')
    <script>
        $('#product').submit(function(){
            $(this).find(':button[type=submit]').prop('disabled', true);
        });
    </script>
@endsection
