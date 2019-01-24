@extends('admin.layouts.main')
@section('title')
Category panel
@endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="javascript"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Category</li>
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
                        Category List
                        <a href="{{ route('admin.category.add')  }}" class="btn btn-info pull-right text-white">ADD NEW</a>
                    </h1>
                </div>
                <hr/>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="?id={{ $category->id }}" >{{ $category->name }}</a></td>
                                    <td><span class="label label-success">Active</span></td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit',$category->id) }}" title="Edit"><i class="icon-pencil5"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {!! $categories->appends(['search' => request('search'), 'id' => request('id')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--vfsdf--}}
    </div>
    <!-- /traffic sources -->
    @endsection
    @section('js')
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    @endsection
