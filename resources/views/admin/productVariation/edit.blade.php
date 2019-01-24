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
                    <label>Price: <span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="Enter Product Price" class="form-control" required pattern="[0-9]" min="0" required value="{{ $variation->price ?: old('price') }}" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label>Quantity: <span class="text-danger">*</span></label>
                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control" required pattern="[0-9]" min="0" value="{{ $variation->qty ?: ('qty') }}" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Image :</label>
                    <input type="file" name="images[]" class="form-control" accept=".jpeg, .jpg, .png" multiple>
                    <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                </div>
            </div>

            <div class="row pull-right">
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </div>
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
    });
    
</script>
@endsection
