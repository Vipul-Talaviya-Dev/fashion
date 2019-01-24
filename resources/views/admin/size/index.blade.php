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
                    <h1 class="panel-title">Sizes
                        <a href="{{ route('admin.size.add') }}" class="btn btn-info pull-right">Add New</a>
                    </h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="content">
                        <div class="panel panel-flat">
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