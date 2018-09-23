@extends('admin.layouts.main')

@section('title')
    Product panel
@endsection

@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Product</li>
                <li class="active">List</li>
            </ul>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .form-control::-webkit-input-placeholder {
            color: #fff;
        }
    </style>
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
                            Product List
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <form class="form-horizontal" method="get" action="">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>Store</label>
                                        <select id="store" class="form-control select-results-color" name="store"
                                                data-placeholder="Select Store">
                                            <option></option>
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }}" {{ request('store') && request('store') == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->get('store'))
                                            @foreach($errors->get('store') as $error)
                                                <span style="color: red;">{{$error}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Category</label>
                                        <select id="category" class="form-control select-results-color" name="category"
                                                data-placeholder="Select Category">
                                            <option></option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category') && request('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->get('category'))
                                            @foreach($errors->get('category') as $error)
                                                <span style="color: red;">{{$error}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>SubCategory</label>
                                        <select id="subCategory" class="form-control select-results-color"
                                                name="subCategory"
                                                data-placeholder="Select SubCategory">
                                            <option></option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('subCategory') && request('subCategory') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->get('subCategory'))
                                            @foreach($errors->get('subCategory') as $error)
                                                <span style="color: red;">{{$error}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Search: </label>
                                        <input type="text" name="search" class="form-control"
                                               style="background: #25A296; color: white" placeholder="Search Text">
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('admin.product.index') }}" class="btn btn-danger form-control" style="margin-top: 27px;">
                                            Reset
                                        </a>
                                    </div>
                                    <div class="pull-right col-md-2">
                                        <input type="submit"
                                               {{ request('store') && request('category') && request('subCategory') ? '' : 'disabled' }} id="search"
                                               class="btn btn-info form-control" style="margin-top: 27px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="content">
                            <a href="{{ route('admin.product.add') }}" class="btn btn-info pull-right"
                               style="margin-right: 20px; margin-top: 20px;">
                                ADD NEW
                            </a>

                            <div class="panel panel-flat">
                                {{--<form class="form-horizontal">--}}
                                {{--<div class="col-md-3" style="margin-top: 20px;">--}}
                                {{--<input type="text" class="form-control" name="search"--}}
                                {{--value="{{ request()->get('search') }}" placeholder="Search">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-1">--}}
                                {{--<a href="{{ route('admin.product.index') }}"--}}
                                {{--class="btn btn-flat btn-rounded btn-xs btn-icon" style="margin-top: 20px;"><i--}}
                                {{--class="icon-reset">Refresh</i></a>--}}
                                {{--</div>--}}
                                {{--</form>--}}

                                <div id="table">

                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Product</th>
                                        <th>Store</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($products))
                                        @foreach($products as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->seller->store->name }}</td>
                                                <td>@if(!empty($product->images[0]->name))<img
                                                            src="{{ \Cloudder::secureShow($product->images[0]->name) }}"
                                                            alt=""
                                                            style="max-height: 50px; max-width: 100px">@endif</td>
                                                @if($product->status == '1')
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-default">In-Active</span></td>
                                                @endif
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li>
                                                                    <a href="{{ route('admin.product.edit', base64_encode($product->id) ) }}"><i
                                                                                class="icon-pencil5"></i> Edit</a></li>
                                                                {{--<li><a href="{{ route('admin.product.edit', base64_encode($product->id) ) }}"><i--}}
                                                                {{--class="icon-trash"></i> Delete</a></li>--}}
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
                                @if(isset($products))
                                    {!! $products->appends([
                                        'search' => request('search'),
                                        'store' => request('store'),
                                        'category' => request('category'),
                                        'subCategory' => request('subCategory'),
                                    ])->render() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--vfsdf--}}
        </div>
    </div>
    <!-- /traffic sources -->
@endsection

@section('js')
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script>
        $('#store').change(function () {
            var store = $('#store').val();
            if ('store') {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('api.store.change') }}',
                    {{--data: {'store': store, '_token': "{{ csrf_token() }}"},--}}
                    success: function (data) {
                        $('#category').empty();
                        if (data) {
                            $("#category").empty();
                            $("#category").append('<option>Select a Category...</option>');
                            $.each(data, function (key, value) {
                                $("#category").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });

                        } else {
                            $("#store").empty();
                        }
                    }
                });
            }
        });

        $('body').on('change', '#category', function () {
            var type = $('#category').val();
            if ('category') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.category.change') }}',
                    data: {'type': type, '_token': "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#subCategory').empty();
                        if (data) {
                            $("#subCategory").empty();
                            $("#subCategory").append('<option>Select a sub category...</option>');
                            $.each(data, function (key, value) {
                                $("#subCategory").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });

                        } else {
                            $("#subCategory").empty();
                        }
                    }
                });
            }
        });

        $('#subCategory').change(function () {
            $("#search").removeAttr('disabled');
        });

    </script>
@endsection
