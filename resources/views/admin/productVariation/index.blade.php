@extends('admin.layouts.main')
@section('title', 'Product Variations ')
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
                        <h1 class="panel-title">Product Variations List
                            <a href="{{ route('admin.product.variationInsert', ['id' => $product->id])  }}" class="btn btn-info pull-right text-white">ADD NEW</a>
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
                                        <th>Product</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($variations as $key => $variation)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $variation->color->name }}</td>
                                                <td>{{ $variation->size->name }}</td>
                                                <td>{{ $variation->price }}</td>
                                                <td>{{ $variation->qty }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.product.variationEdit', $variation->id) }}"><i class="icon-pencil5"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $variations->appends([
                                    'search' => request('search'),
                                    'category' => request('category'),
                                ])->render() !!}
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
