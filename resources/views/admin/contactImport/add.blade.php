@extends('admin.layouts.main')
@section('title')
    Contact Import
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Form</li>
                <li class="active">Contact Import</li>
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
                        <h1 class="panel-title">Contact Import
                            <a style="margin-left: 10px;" href="{{ route('admin.contantImports') }}" class="btn btn-primary pull-right">contant Import List</a> 

                            <a href="/contactImport.xlsx" class="btn btn-primary pull-right" download> Download Excel</a>
                        </h1>
                    </div>
                    <hr/>
                    <!-- Single row selection -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel-body">
                                    <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.contantImport') }}"
                                          method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <fieldset class="content-group">
                                            <div class="form-group">
                                                <div class="col-lg-1"></div>
                                                <label class="col-lg-2 control-label text-semibold"> file
                                                    upload:</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="contactImport" class="file-styled" accept=".xlsx">
                                                    <span class="help-block">Upload Only Excel File (.xlsx) Format</span>
                                                    @if($errors->get('contactImport'))
                                                        @foreach($errors->get('contactImport') as $error)
                                                            <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div><b>Note: Download after first Row to write mobile no.</b></div>
                                </div>
                                <!-- /marketing campaigns -->
                            </div>
                        </div>
                    </div>
                   <!-- /single row selection -->
                </div>
            </div>
        </div>
        <!-- /traffic sources -->
        <!-- /content area -->
        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/styling/switch.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>

            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
@endsection
