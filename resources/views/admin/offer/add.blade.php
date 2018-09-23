@extends('admin.layouts.main')
@section('title', 'Offer Add')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Offer Add</li>
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
                        <h1 class="panel-title">
                            <a href="{{ route('admin.offers') }}">
                                <button class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
                            </a> Offer Add
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <div class="panel-body">
                                <form class="form-horizontal form-validate-jquery" id="product"
                                      action="{{ route('admin.offer.create') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="content-group">
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label class="control-label">Name <span
                                                                class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                               required="required" value="{{ old('name') }}"
                                                               placeholder="Enter Name" autocomplete="off">
                                                    </div>
                                                    @if($errors->get('name'))
                                                        @foreach($errors->get('name') as $error)
                                                            <span style="color: red;"><i
                                                                        class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="control-label">Offer Code <span
                                                                class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i>
                                                        </div>
                                                        <input type="text" name="offerCode" class="form-control"
                                                               required="required" value="{{ old('offerCode') }}"
                                                               placeholder="Enter Offer Code" autocomplete="off">
                                                    </div>
                                                    @if($errors->get('offerCode'))
                                                        @foreach($errors->get('offerCode') as $error)
                                                            <span style="color: red;"><i
                                                                        class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /first name -->

                                            <!-- Password field -->
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label class="control-label">Discount <span
                                                                class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-money"></i>
                                                        </div>
                                                        <input type="number" name="discount" class="form-control"
                                                               value="{{ old('discount') }}" id="discount"
                                                               required="required" autocomplete="off"
                                                               placeholder="Enter Offer In percentage">
                                                    </div>
                                                    <span class="help-block"> (Discount in percentage)</span>
                                                    @if($errors->get('discount'))
                                                        @foreach($errors->get('discount') as $error)
                                                            <span style="color: red;"><i
                                                                        class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="control-label">Start Date <span
                                                                class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" name="start_date" id="start_date"
                                                               class="form-control" required="required"
                                                               placeholder="Enter the Offer Start Date"
                                                               value="{{ old('start_date') }}" autocomplete="off">
                                                        @if($errors->get('start_date'))
                                                            @foreach($errors->get('start_date') as $error)
                                                                <span style="color: red;"><i
                                                                            class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label class="control-label">End Date <span
                                                                class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" name="end_date" id="end_date"
                                                               class="form-control"
                                                               required="required" autocomplete="off"
                                                               placeholder="Enter the Offer End Date"
                                                               value="{{ old('end_date') }}">

                                                    </div>
                                                    @if($errors->get('end_date'))
                                                        @foreach($errors->get('end_date') as $error)
                                                            <span style="color: red;"><i
                                                                        class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <label class="control-label">Status <span
                                                                        class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="status" class="styled"
                                                                           value="1" checked>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-default" id="reset">Reset <i
                                                        class="icon-reload-alt position-right"></i></button>
                                            <button type="submit" class="btn btn-primary">Submit <i
                                                        class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <!-- /content area -->

        @endsection
        @section('js')
            <script>
                $(document).ready(function () {

                    $("#start_date").datepicker({
                        todayBtn: 1,
                        startDate: '-0d',
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                    }).on('changeDate', function (selected) {
                        var minDate = new Date(selected.date.valueOf());
                        $('#end_date').datepicker('setStartDate', minDate);
                    });

                    $("#end_date").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                    }).on('changeDate', function (selected) {
                        var maxDate = new Date(selected.date.valueOf());
                        $('#start_date').datepicker('setEndDate', maxDate);
                    });
                    $('#product').submit(function(){
                        $(this).find(':button[type=submit]').prop('disabled', true);
                    });
                });
            </script>
@endsection
