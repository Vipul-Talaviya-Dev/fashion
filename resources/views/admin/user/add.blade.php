@extends('admin.layouts.main')
@section('title', 'User Create')

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">User Create</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">
            User Add
            <a href="{{ route('admin.users')  }}" class="btn btn-info pull-right text-white">List</a>
        </h5>
    </div>
    <div class="panel-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.user.create') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First Name: <span class="text-danger">*</span></label>
                    <input type="text" name="firstName" placeholder="Enter First Name" class="form-control required" required value="{{ old('firstName') }}" autocomplete="off">
                    @foreach($errors->get('firstName') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name: <span class="text-danger">*</span></label>
                    <input type="text" name="lastName" placeholder="Enter Last Name" class="form-control required" required value="{{ old('lastName') }}" autocomplete="off">
                    @foreach($errors->get('lastName') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email: <span class="text-danger">*</span></label>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control required" required value="{{ old('email') }}" autocomplete="off">
                    @foreach($errors->get('email') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label>Mobile: <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control required" required value="{{ old('mobile') }}" autocomplete="off">
                    @foreach($errors->get('mobile') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Birth Date: <span class="text-danger">*</span></label>
                    <input type="text" name="birthDate" placeholder="Enter Birth Date" class="form-control required birthDate" required value="{{ old('birthDate') }}" max="{{ date('Y-m-d') }}" autocomplete="off">
                    @foreach($errors->get('birthDate') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label>Anniversary Date: <span class="text-danger">*</span></label>
                    <input type="text" name="anniversaryDate" placeholder="Enter Anniversary Date" class="form-control required anniversaryDate" required value="{{ old('anniversaryDate') }}" max="{{ date('Y-m-d') }}" autocomplete="off">
                    @foreach($errors->get('anniversaryDate') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Password: <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control required" required autocomplete="off">
                    @foreach($errors->get('password') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label>Confirm Password: <span class="text-danger">*</span></label>
                    <input type="password" name="confirmPassword" class="form-control required" required autocomplete="off">
                    @foreach($errors->get('confirmPassword') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Generate Member Code: </label><br>
                    <input type="checkbox" name="memberCode" value="1">
                </div>
            </div>
            <p><br></p>
            <div class="row pull-right">
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $(".birthDate").datepicker({
            todayBtn: 1,
            minDate: '-0d',
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $(".anniversaryDate").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

    });
</script>
@endsection
