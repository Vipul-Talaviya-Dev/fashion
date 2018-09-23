@extends('admin.layouts.main')
@section('title')
    Category panel
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="javascript"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Form</li>
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
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <a href="{{ route('admin.category.add')  }}">
                                <button class="btn btn-info pull-right" style="margin-right: 20px; margin-top: 20px;">
                                    ADD NEW
                                </button>
                            </a>
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-3" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search"
                                               value="{{ request()->get('search') }}" placeholder="Search">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('admin.categories') }}"
                                           class="btn btn-flat btn-rounded btn-xs btn-icon" style="margin-top: 20px;"><i
                                                    class="icon-reset">Refresh</i></a>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($categories))
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><a href="?id={{ $category->id }}" >{{ $category->name }}</a></td>
                                                <td><span class="label label-success">Active</span></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle"
                                                               data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li>
                                                                    <a href="{{ route('admin.category.edit',$category->id) }}"><i class="icon-pencil5"></i>Edit</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
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
