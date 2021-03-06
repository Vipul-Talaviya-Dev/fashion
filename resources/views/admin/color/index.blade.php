@extends('admin.layouts.main')
@section('title', 'Colors')
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
                        <h1 class="panel-title">
                            Color
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <a href="{{ route('admin.color.add') }}">
                            <button class="btn btn-block-group pull-right"
                                    style="margin-right: 40px; margin-top: 20px;"><i
                                        class="icon-plus22 position-left"></i>ADD COLOR
                            </button>
                        </a>
                        <div class="content">
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}" placeholder="Search" autocomplete="off">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('admin.colors') }}" class="btn btn-labeled btn-rounded btn-info" style="margin-top: 20px;"><b><i class="icon-reset"></i></b> Rrefresh
                                        </a>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Color</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($colors))
                                        @foreach($colors as $key => $color)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $color->name }}</td>
                                                <td>{{ $color->code }}</td>
                                                <td style="background-color: {{ $color->code }};"></td>
                                                @if($color->status == '1' )
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-default">Inactive</span></td>
                                                @endif

                                                <td class="text-center">
                                                    <a href="{{ route('admin.color.edit', ['id' => $color->id]) }}"><i class="icon-pencil5"></i>Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $colors->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--vfsdf--}}
        </div>
        <!-- /content area -->

        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/datatables_api.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
@endsection
