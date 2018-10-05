@extends('admin.layouts.main')
@section('title', 'Product update panel')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">Product</h6>
            </div>
            <form class="stepy-validation" id="product"
                  action="{{ route('admin.product.update', $product->id) }}"
                  method="post"
                  enctype="multipart/form-data">
                {{ csrf_field()  }}
                <fieldset title="1">
                    <legend class="text-semibold">Seller Info</legend>
                    <div class="row">
                        <label class="col-md-1">Status:</label>
                        <div class="col-md-11">
                            <label class="radio-inline">
                                <input type="radio" @if($product->status == 1) checked
                                       @endif name="status" class="styled"
                                       value="1">
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" @if($product->status == 2) checked
                                       @endif name="status"
                                       value="2"
                                       class="styled">
                                In-Active
                            </label>
                        </div>
                        @if($errors->get('status'))
                            @foreach($errors->get('status') as $error)
                                <span style="color: red;"><i
                                            class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                            @endforeach
                        @endif
                    </div>

                </fieldset>

                <fieldset title="2">
                    <legend class="text-semibold">Product Details</legend>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name: <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Enter Product"
                                       value="{{ $product->name }}" class="form-control required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Brand: <span class="text-danger">*</span></label>
                                <select name="brand" data-placeholder="Select Brand Name"
                                        class="select required">
                                    <option></option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ ($product->brand_id == $brand->id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price: <span class="text-danger">*</span></label>
                                <input type="text" name="price" placeholder="Enter Price"
                                       value="{{ $product->price }}" class="form-control required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>MaxPrice: <span class="text-danger">*</span></label>
                                <input type="text" name="maxPrice" placeholder="Enter Max Price"
                                       value="{{ $product->max_price }}" class="form-control required"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control"
                                          data-placeholder="Enter Product Details">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($product->variations as $variation)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Color: <span class="text-danger">*</span></label>
                                    <input type="text" name="color[]" value="{{ $variation->color->name }}"
                                           class="form-control color" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Size: <span class="text-danger">*</span></label>
                                    <input type="text" name="size[]" value="{{ $variation->size->name }}"
                                           class="form-control color" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Quantity: <span class="text-danger">*</span></label>
                                    <input type="text" name="quantity[]" placeholder="Enter Quantity"
                                           class="form-control" value="{{ $variation->qty }}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Price: <span class="text-danger">*</span></label>
                                    <input type="text" name="prices[]" placeholder="Enter price"
                                           class="form-control" value="{{ $variation->price }}" required>
                                    <input type="hidden" name="variationID[]" value="{{ $variation->id }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary stepy-finish">Submit <i
                            class="icon-check position-right"></i></button>
            </form>
            {{--@else--}}
        </div>
    </div>
        <!-- /content area -->
        @endsection
        @section('js')

            <script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/wizards/stepy.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/wizard_stepy.js"></script>
            <script type="text/javascript" src="/assets/js/cloudinary_widget.js"></script>

            <script>
                $('#product').submit(function () {
                    $(this).find(':button[type=submit]').prop('disabled', true);
                });
            </script>
@endsection