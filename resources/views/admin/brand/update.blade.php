@extends('admin.layouts.main')
@section('title')
    Brand panel
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Form</li>
                <li class="active">Brand</li>
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
                        <h1 class="panel-title">Brand
                            <a href="{{ route('admin.brands') }}" class="btn btn-primary pull-right">Brand List</a>
                        </h1>
                    </div>
                    <hr/>
                    <!-- Single row selection -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel-body">
                                    <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.brand.update',['id'=> $brand->id]) }}"
                                          method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <fieldset class="content-group">
                                            <div class="form-group">
                                                <div class="col-lg-1"></div>
                                                <label class="col-lg-2 control-label text-semibold">Brand :</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="name" value="{{ $brand->name }}" class="form-control" placeholder="Enter Brand Name" autocomplete="off" required="">
                                                    @if($errors->get('name'))
                                                        @foreach($errors->get('name') as $error)
                                                            <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-1"></div>
                                                <label class="col-lg-2 control-label text-semibold">Image file
                                                    upload:</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="image" class="file-styled"  accept=".jpeg, .jpg, .png, .gif">
                                                    <span class="help-block">Minimum image size required (1000 * 400)</span>
                                                    @if($errors->get('image'))
                                                        @foreach($errors->get('image') as $error)
                                                            <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            {{--Status--}}
                                            <div class="form-group">
                                                <div class="col-lg-1"></div>
                                                <label class="col-lg-2 control-label text-semibold">Status:</label>
                                                <div class="col-lg-8">
                                                    <label class="radio-inline">
                                                        <input type="radio" checked name="status" @if($brand->status==2) {{'checked'}} @endif  value="1">
                                                        Active
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="status"  @if($brand->status==2) {{'checked'}} @endif  value="2">
                                                        In-Active
                                                    </label>
                                                </div>
                                                @if($errors->get('status'))
                                                    @foreach($errors->get('status') as $error)
                                                        <span style="color: red;"><i
                                                                    class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                    @endforeach
                                                @endif
                                                <div class="col-lg-1"></div>
                                            </div>
                                            {{--Status--}}
                                            <div class="text-right">
                                                <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
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
            <script>
                $('#product').submit(function(){
                    $(this).find(':button[type=submit]').prop('disabled', true);
                });
            </script>
@endsection
