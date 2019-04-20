@extends('admin.layouts.main')
@section('title', 'Banners')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Banners</li>
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
                            <span>Banners</span>
                            <a href="{{ route('admin.banner.add') }}">
                                <button class="btn btn-block-group pull-right" style="margin-right: 40px; margin-top: 20px;"><i class="icon-plus22 position-left"></i>ADD Banner </button>
                            </a>
                        </h1>
                    </div>
                    <hr/>
                    <div class="">
                        <div class="panel panel-flat">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>URL </th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($banners))
                                        @foreach($banners as $key => $banner)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $banner->name }}</td>
                                                <td>{{ $banner->url }}</td>
                                                @if(!empty($banner->image))
                                                    <td><img src="{{ \Cloudder::secureShow($banner->image) }}" alt=""
                                                             style="max-height: 100px; max-width: 200px"></td>
                                                @else
                                                    <td><span class="label label-default">No</span></td>
                                                @endif

                                                <td>{{ $banner->description ?: 'N/A' }}</td>
                                                @if($banner->status == 1)
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-danger">In-Active</span></td>
                                                @endif

                                                <td class="text-center"><a href="{{ route('admin.banner.edit',$banner->id) }}"><i class="icon-pencil5"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pull-right">
                            {!! $banners->render() !!}
                        </div>
                    </div>
                </div>
            </div>
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
