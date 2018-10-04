@extends('admin.layouts.main')
@section('title', 'Window Images')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Window Images</li>
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
                        <h1 class="panel-title">Window Images</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <a href="{{ route('admin.windowImage.add') }}">
                            <button class="btn btn-block-group pull-right" style="margin-right: 40px; margin-top: 20px;"><i class="icon-plus22 position-left"></i>ADD New </button>
                        </a>
                        <div class="content">
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search"
                                               value="{{ request()->get('search') }}" placeholder="Search" autocomplete="off">
                                    </div>
                                    <div class="col-md-1"><a href="{{ route('admin.windowImages') }}" class="btn btn-labeled btn-rounded btn-info" style="margin-top: 20px;"><b><i class="icon-reset"></i></b> Refresh </a></div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>URL </th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($windowImages))
                                        @foreach($windowImages as $key => $windowImage)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $windowImage->title }}</td>
                                                <td><a href="{{$windowImage->link}}" target="_blank" class="btn btn-sm btn-info">View URL</a></td>
                                                @if(!empty($windowImage->image))
                                                    <td><img src="{{ \Cloudder::secureShow($windowImage->image) }}" alt="" style="max-height: 100px; max-width: 200px"></td>
                                                @else
                                                    <td><span class="label label-default">No</span></td>
                                                @endif

                                                <td>{{ $windowImage->description }}</td>
                                                @if($windowImage->status == 1)
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-danger">In-Active</span></td>
                                                @endif

                                                <td class="text-center"><a href="{{ route('admin.windowImage.edit',$windowImage->id) }}"><i class="icon-pencil5"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $windowImages->render() !!}
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
