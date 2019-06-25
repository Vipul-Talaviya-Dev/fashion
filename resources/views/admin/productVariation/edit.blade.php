@extends('admin.layouts.main')
@section('title', 'Product Variation Update')

@section('style')
<link rel="stylesheet" type="text/css" href="/ckeditor/contents.css" />
<link rel="stylesheet" type="text/css" href="/select2/select2.min.css" />
@endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Product Variation Update</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Product Variation Update <a href="{{ route('admin.product.variations', ['id' => $variation->product_id])  }}" class="btn btn-info pull-right text-white">List</a></h5>
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

        <form action="{{ route('admin.product.variationUpdate', ['id' => $variation->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Product: <span class="text-danger">*</span></label>
                    <select class="form-control" name="productId" required>
                        <option value="">-- Select Product --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $variation->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Color: <span class="text-danger">*</span></label>
                    <select class="form-control color" name="colorId" required>
                        <option value="">-- Select Color --</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}" {{ $color->id == $variation->color_id ? 'selected' : '' }} style="background-color: {{ $color->code }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Size: <span class="text-danger">*</span></label>
                    <select class="form-control" name="sizeId" required>
                        <option value="">-- Select Size --</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ $size->id == $variation->size_id ? 'selected' : '' }}>{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Purchase Price: <span class="text-danger">*</span></label>
                    <input type="number" name="purchase_price" placeholder="Enter Product Purchase Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $variation->purchase_price ?: old('purchase_price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>Selling Price: <span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="Enter Product Selling Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $variation->price ?: old('price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label>Quantity: <span class="text-danger">*</span></label>
                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control" required pattern="[0-9]" min="0" value="{{ $variation->qty ?: ('qty') }}" autocomplete="off">
                </div>
                <div class="col-md-3 form-group">
                    <label>Image :</label>
                    <input type="file" name="images[]" class="form-control" accept=".jpeg, .jpg, .png" multiple>
                    <span><b>Note:</b> 306 X 400 Image Upload.</span>
                    <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                </div>
            </div>
            <div class="row">
                <label><b>Barcode</b></label>
                <div class="form-group">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->id, 'C39+') }}" alt="barcode" />
                </div>
            </div><br>
            <div class="row">
                <?php
                    $product_type_ids = [];
                    if($variation->product_type_id) {
                        $product_type_ids = explode(',', $variation->product_type_id);
                    }
                ?>
                 <div class="col-md-4 form-group">
                    <label>Type :<span class="text-danger">*</span></label>
                    <select class="form-control type"  required name="typeIds[]" multiple>
                        <option value="">-- Select Product Type --</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}" 
                            @if(in_array($type->id, $product_type_ids))
                                selected
                            @endif
                        >{{ $type->name }}</option>
                        @endforeach        
                    </select>
                    @foreach($errors->get('typeId') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="pull-right">
                    <label><p>&nbsp;&nbsp;</p><p>&nbsp;&nbsp;</p></label>
                    <button type="submit" class="btn btn-primary stepy-finish">
                        Submit <i class="icon-check position-right"></i>
                    </button>
                </div>
            </div>
            <p><br></p>
            <p><br></p>
                <ul style="list-style: none;">
                    @foreach($images as $image)
                    <li style="float: left;"><img style="margin-left: 20px;" src="{{ \Cloudder::secureShow($image) }}" class="img-responsive" style="width: 50px;"></li>
                    @endforeach
                </ul>
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

        $('.type').select2({
            placeholder: 'Select a type'
        });
    });
    
</script>
@endsection
