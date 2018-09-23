@extends('admin.layouts.main')
@section('title')
    Size panel
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Size Add</li>
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
                        <h1 class="panel-title">Size Add</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="panel-body">
                                <form class="form-horizontal form-validate-jquery" id="product" action="{{ route('admin.size.create') }}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-2"></div>
                                            <label class="col-lg-2 control-label text-semibold">Size <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="size" id="size" autocomplete="off" 
                                                       value="{{ old('size') }}" class="form-control"
                                                       placeholder="Enter Size">
                                                @if($errors->get('size'))
                                                    @foreach($errors->get('size') as $error)
                                                        <span style="color: red;">{{$error}}</span>
                                                    @endforeach
                                                @endif
                                                <div id="unique"></div>
                                            </div>
                                            <div class="col-lg-2"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-2"></div>
                                            <label class="col-lg-2 control-label text-semibold">Status <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <label class="radio-inline">
                                                    <input type="radio" checked name="status" class="styled"
                                                           value="1">
                                                    Active
                                                </label>

                                                <label class="radio-inline">
                                                    <input type="radio" name="status"
                                                           value="2"
                                                           class="styled">
                                                    In-Active
                                                </label>
                                            </div>
                                            @if($errors->get('status'))
                                                @foreach($errors->get('status') as $error)
                                                    <span style="color: red;"><i
                                                                class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                @endforeach
                                            @endif
                                            <div class="col-lg-2"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-8">
                                                <button type="submit" class="btn btn-primary">Submit <i
                                                            class="icon-arrow-right14 position-right"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
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
