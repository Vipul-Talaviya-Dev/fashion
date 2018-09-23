@extends('admin.layouts.main')
@section('title', 'Color Update')
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
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h1 class="panel-title">Color Update</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="panel-body">
                                <form class="form-horizontal form-validate-jquery" action="{{ route('admin.color.update', ['id' => $color->id]) }}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-3">
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="control-label">Color Picker</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="code" id="color" class="form-control colorpicker-flat-full" data-preferred-format="hex" value="{{ $color->code }}">
                                            </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-3">
                                                <input type="hidden" name="color" value="{{ $color->name }}" id="cname" value="">
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="control-label">Status</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="radio-inline">
                                                    <input type="radio" @if($color->status == '1') checked @endif name="status" class="styled"
                                                           value="1">
                                                    Active
                                                </label>

                                                <label class="radio-inline">
                                                    <input type="radio" @if($color->status == '2') checked @endif name="status"
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
                                            <div class="col-lg-3"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <div class="col-lg-5">
                                            </div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn bg-teal">Submit <i
                                                            class="icon-arrow-right14 position-right"></i></button>
                                                <button type="reset" class="btn btn-default" id="reset">Reset <i
                                                            class="icon-reload-alt position-right"></i></button>
                                            </div>
                                            <div class="col-lg-3">
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
        <!-- /content area -->

        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/pickers/color/spectrum.js"></script>

            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/picker_color.js"></script>
            <script type="text/javascript" src="http://chir.ag/projects/ntc/ntc.js"></script>
            <script type="text/javascript">
                $('#color').change(function () {
                    var color = $('#color').val();
                    var color_match = ntc.name(color);
                    name = color_match[1];
                    $('#cname').val(name);
                });
            </script>

@endsection
