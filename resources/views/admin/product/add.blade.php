@extends('admin.layouts.main')
@section('title', 'Product Create')

@section('style')
<link rel="stylesheet" type="text/css" href="/ckeditor/contents.css" />
<link rel="stylesheet" type="text/css" href="/select2/select2.min.css" />
@endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Product Create</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">Product Add <a href="{{ route('admin.products')  }}" class="btn btn-info pull-right text-white">List</a></h5>
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

        <form action="{{ route('admin.product.create') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Main Category: <span class="text-danger">*</span></label>
                        <select data-placeholder="Select Main Category" class="form-control category" required name="categoryId">
                            <option value="">-- Select Main Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('categoryId') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach        
                        </select>
                        @if($errors->get('categoryId'))
                        @foreach($errors->get('categoryId') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="subCategoryDiv"></div>
                <div class="form-group col-md-6">
                    <label>Product Name (User Side Shown): <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control required" required value="{{ old('name') }}" autocomplete="off">
                    @foreach($errors->get('name') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Product Name (Admin Side Shown): <span class="text-danger">*</span></label>
                    <input type="text" name="adminProductName" placeholder="Enter Product Name" class="form-control required" required value="{{ old('adminProductName') }}" autocomplete="off">
                    @foreach($errors->get('adminProductName') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="col-md-4 form-group">
                    <label>Type :<span class="text-danger">*</span></label>
                    <select class="form-control" required name="typeId">
                        <option value="">-- Select Main Category --</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('typeId') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach        
                    </select>
                    @foreach($errors->get('typeId') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Meta Keyword: <span class="text-danger">*</span></label>
                    <input type="text" name="meta_keyword" value="T-shirt, Jens" class="form-control metaKeyword" data-fouc required="">
                    @foreach($errors->get('meta_keyword') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
                <div class="col-md-4 form-group">
                    <label>Meta Description :<span class="text-danger">*</span></label>
                    <textarea name="meta_description" class="form-control required" required placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                    @foreach($errors->get('meta_description') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                </div>
            </div>
<!--             <div class="row">
                <input type="button" id="add" class="btn bg-teal" name="add" value="ADD MORE">
            </div><p><br></p> -->
            <div class="row">
                <label>Description :</label>
                <textarea name="description" id="editor" rows="4" cols="4" class="form-control required" data-placeholder="Enter Product Details" required>{{ old('description') }}</textarea>
                @foreach($errors->get('description') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
            </div>
            <p><br></p>
            <div class="row">
                <label>Chart :</label>
                <textarea name="chart" id="editor1" rows="4" cols="4" class="form-control required"  required>{{ old('chart') }}</textarea> 
                @foreach($errors->get('chart') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
            </div>  
            <p><br></p>
            <div class="row pull-right">
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script type="text/javascript" src="/select2/select2.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/samples/js/sample.js"></script>
<script type="text/javascript">
    initSample();
    $('#form').submit(function () {
        $(this).find(':button[type=submit]').prop('disabled', true);
    });

    var form_html = '';
    var html_inc = '0';
    $(document).ready(function () {
        $('#size_0').select2({
            placeholder: 'Select a Size'
        });

        $('.metaKeyword').tokenfield();
        form_html = $('#product0').html();
    });
    $(function () {
        $('#add').on('click', function () {
            html_inc++;
            var html1 = '<div id="product' + html_inc + '">' + '<button id="' + html_inc + '" class="btnrmv pull-right btn btn-danger" style="margin-top: 28px;"><i class="fa fa-remove"></i></button>' + form_html + '';
            $('.sizes').select2();
            $('.addmore').append(html1);
            $('#product' + html_inc).find('#size_0').attr('id', 'size_'+html_inc);
            $('#size_' + html_inc).select2().trigger('change');
            // $('.sizes').select2();
            $(document).on('click', '.btnrmv', function () {
                var _id = $(this).attr('id');
                $('#product' + _id).remove();
                $(this).remove();
            });
        });
    });

    $('#submit').on('click', function () {
        colors.forEach(function (color) {
            $('#cloudinaryInput' + color.id).val(color.images.join(','));
        });
    });
    var count = 1;
    $('body').on('change', '.category', function () {
        var id = $(this).val();
        if (id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('api.subCategory') }}',
                data: {'id': id, '_token': "{{ csrf_token() }}"},
                success: function (data) {
                    $("#subCategory").empty();
                    if (data.status) {
                        if(data.categories.length > 0) {
                            $(".subCategoryDiv").show();
                            var categories = '<option value="">-- Select SubCategory --</option>';
                            $.each(data.categories, function (key, value) {
                                categories +='<option value="' + value['id'] + '">' + value['name'] + '</option>';
                            });
                            $(".subCategoryDiv").html('<div class="col-md-3"><div class="form-group"><label>Sub Category: <span class="text-danger">*</span></label><select name="categoryId"  data-placeholder="Select Type First" class="form-control category subCategory">'+categories+'</select></div>'); 
                            count++;  
                        }
                    } else {
                        $(".subCategory").empty();
                        $(".subCategoryDiv").hide();
                    }
                }
            });
        }
    });

    $('#finish').css('display', 'none');
</script>
@endsection
