@extends('admin.layouts.main')
@section('title', 'Product Type')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Product Type</li>
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
                    <h1 class="panel-title">Product Type
                        <a href="{{ route('admin.productType.add') }}" class="btn btn-info pull-right">Add New</a>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productTypes as $key => $productType)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $productType->name }}</td>
                                        @if($productType->status == '1')
                                        <td><span class="label label-success">Active</span></td>
                                        @else
                                        <td><span class="label label-default">In-Active</span></td>
                                        @endif
                                        <td class="text-center"><a href="{{ route('admin.productType.edit', $productType->id) }}"><i class="icon-pencil5"></i> Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {!! $productTypes->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /traffic sources -->
</div>
@endsection