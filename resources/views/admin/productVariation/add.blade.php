@extends('admin.layouts.main')
@section('title', 'Product Variation add')

@section('style')
<link rel="stylesheet" type="text/css" href="/ckeditor/contents.css" />
<link rel="stylesheet" type="text/css" href="/select2/select2.min.css" />
@endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Product Variation Add</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Product Variation Add <a href="{{ route('admin.product.variations', ['id' => $product->id])  }}" class="btn btn-info pull-right text-white">List</a></h5>
    </div>
    <div class="panel-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.product.variationCreate', ['id' => $product->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Color: <span class="text-danger">*</span></label>
                    <select name="colorId" class="form-control color" required>
                        <option value="">Choose a Color...</option>
                        @foreach($colors as $color)
                        <option value="{{ $color->id }}" style="background-color: {{ $color->code }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Size: <span class="text-danger">*</span></label>
                    <select name="sizes[]" class="form-control size" multiple=""  required>
                        <option value="">Choose a Size...</option>
                        @foreach($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Price: <span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="Enter Product Price" class="form-control" required pattern="[0-9]" min="0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Quantity: <span class="text-danger">*</span></label>
                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control" required pattern="[0-9]" min="0">
                </div>
                <div class="col-md-4 form-group">
                    <label>Image :<span class="text-danger">*</span></label>
                    <input type="file" name="images[]" class="form-control required" required accept=".jpeg, .jpg, .png" multiple>
                    <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                </div>
            </div>
            <div class="row pull-right">
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </div>
        </div>  
    </form>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/select2/select2.js"></script>
<script type="text/javascript">
    $('#form').submit(function () {
        $(this).find(':button[type=submit]').prop('disabled', true);
    });

    $(document).ready(function () {
        $('.size').select2({
            placeholder: 'Select a Size'
        });
    });
    
</script>
@endsection
