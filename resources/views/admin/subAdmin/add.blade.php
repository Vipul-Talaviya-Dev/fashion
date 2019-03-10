@extends('admin.layouts.main')
@section('title', 'Sub Admin Add')
@section('style')
<link rel="stylesheet" type="text/css" href="/select2/select2.min.css" />
@endsection

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Sub Admin Add</h5>
    </div>
    <div class="panel-body">
        <form action="{{ route('admin.subAdmin.create') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label> Name: <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Enter  Name" class="form-control required" required value="{{ old('name') }}" autocomplete="off">
                    @foreach($errors->get('name') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label> Email: <span class="text-danger">*</span></label>
                    <input type="email" name="email" placeholder="Enter  Email" class="form-control required" required value="{{ old('email') }}" autocomplete="off">
                    @foreach($errors->get('email') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label> Password: <span class="text-danger">*</span></label>
                    <input type="password" name="password" placeholder="Enter  Password" class="form-control required" required value="" autocomplete="off">
                    @foreach($errors->get('password') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>

                <div class="form-group col-md-6">
                    <label> Modules: <span class="text-danger">*</span></label>
                    <select data-placeholder="Select Main Category" class="form-control modules" required name="modules[]" multiple>
                            <option value="">-- Select Main Category --</option>
                            @foreach($modules as $module)
                            <option value="{{ $module->id }}" >{{ $module->name }}</option>
                            @endforeach        
                    </select>
                    @foreach($errors->get('modules') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
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
<script type="text/javascript" src="/select2/select2.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modules').select2();
    });
</script>
@endsection