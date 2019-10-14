@extends('admin.layouts.main')
@section('title', 'Prodcuts')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Products</li>
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
                        <h1 class="panel-title">Product List
                            <a href="{{ route('admin.product.add')  }}" class="btn btn-info pull-right text-white">ADD NEW</a>
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <div class="panel panel-flat">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product User Side</th>
                                        <th>Product Admin Side</th>
                                        <th>HSN Code</th>
                                        <th>Add Variation</th>
                                        <th>View Variation</th>
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
                                                <td>{{ $product->admin_side_name_show or '-' }}</td>
                                                <td>{{ $product->hsn_code or '-' }}</td>
                                                <td><a href="{{ route('admin.product.variationInsert', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> </a></td>
                                                <td><a href="{{ route('admin.product.variations', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a></td>
                                                @if($product->status == 1)
                                                    <td><span class="label label-success">Active</span></td>
                                                @else
                                                    <td><span class="label label-default">In-Active</span></td>
                                                @endif
                                                <td class="text-center">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"><i class="icon-pencil5"></i> Edit</a>
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
                                        'category' => request('category'),
                                    ])->render() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
@endsection
