@extends('admin.layouts.main')
@section('title', 'Sizes')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Sizes</li>
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
                        <h1 class="panel-title">Sizes</h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <a href="{{ route('admin.size.add') }}">
                                <button class="btn btn-block-group pull-right" style="margin-right: 20px; margin-top: 20px;"><i class="icon-plus22 position-left"></i>ADD SIZE
                                </button>
                            </a>
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search" autocomplete="off" 
                                               value="{{ request()->get('search') }}" placeholder="Search">
                                    </div>
                                    <div class="col-md-1"><a href="{{ route(
                                        'admin.sizes') }}" class="btn btn-labeled btn-rounded btn-info" style="margin-top: 20px;"><b><i class="icon-reset"></i></b> Rrefresh</a></div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Size</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($sizes))
                                        @foreach($sizes as $key => $size)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $size->name }}</td>
                                                @if($size->status == '1')
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-default">In-Active</span></td>
                                                @endif
                                                <td class="text-center"><a href="{{ route('admin.size.edit', $size->id) }}"><i class="icon-pencil5"></i> Edit</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $sizes->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--vfsdf--}}
        </div>
        <!-- /traffic sources -->
    </div>
@endsection