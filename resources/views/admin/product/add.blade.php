@extends('admin.layouts.main')
@section('title', 'Product Create')

@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ 'admin.dashboard' }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Product Create</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">Product Create</h6>
        </div>
        @if(!Session::get('product'))
            <form class="stepy-validation" action="{{ route('admin.product.create') }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field()  }}
                @include('admin.product.partials.product')
                @include('admin.product.partials.productDetails')
                <button type="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </form>
        @else
            <form class="stepy-validation" id="form" action="{{ route('admin.product.insert') }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field()  }}
                <fieldset>
                    <legend class="text-semibold">Personal data</legend>
                    <div class="row">
                        @foreach($colors as $color)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ $color->name }} :<span class="text-danger">*</span></label>
                                    <input id="cloudinaryInput{{ $color->id }}" name="colorImages[{{ $color->id }}]"
                                           type="hidden"
                                           class="file-styled from-control cloudinary" required multiple>
                                    <input name="file" id="cloudinaryButton{{ $color->id }}" type="file"
                                           class="cloudinary-fileupload"
                                           data-cloudinary-field="image_id"
                                           data-form-data=" ... html-escaped JSON data ... " required>
                                    <span class="help-block">Accepted formats: jpeg, jpg, png. Max file size 2Mb</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>

                <button type="submit" id="submit" class="btn btn-primary stepy-finish">
                    Submit <i class="icon-check position-right"></i>
                </button>
            </form>
        @endif
    </div>

@endsection

@section('js')

    <script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/wizards/stepy.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/wizard_stepy.js"></script>
    <script type="text/javascript" src="/assets/js/cloudinary_widget.js"></script>
    <script type="text/javascript">

        $('#form').submit(function () {
            $(this).find(':button[type=submit]').prop('disabled', true);
        });

        cloudinary.setCloudName("{{ env('CLOUDINARY_CLOUD_NAME') }}");

        var colors = {!! json_encode(isset($colors) ? $colors->map(function($color) {
            return ['id' => $color->id, 'images' => []];
        }) : []) !!};
        if (colors.length) {
            colors.forEach(function (color) {
                $('#cloudinaryButton' + color.id).cloudinary_upload_widget({
                    upload_preset: 'fzxyvode'
                }, function (error, result) {
                    result.forEach(function (image) {
                        color.images.push(image.public_id);
                    });
                });
            });

        }

        var form_html = '';
        var html_inc = '0';
        $(document).ready(function () {
            form_html = $('#product0').html();
        });
        $(function () {
            $('#add').on('click', function () {
                html_inc++;
                var html1 = '<div id="product' + html_inc + '">' + '<button id="' + html_inc + '" class="btnrmv pull-right btn btn-danger" style="margin-top: 28px;"><i class="fa fa-remove"></i></button>' + form_html + '';
                $('.addmore').append(html1);
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
                                $("#subCategoryDiv").show();
                                var categories = '<option value="">-- Select SubCategory --</option>';
                                $.each(data.categories, function (key, value) {
                                    categories +='<option value="' + value['id'] + '">' + value['name'] + '</option>';
                                });
                                $("#subCategoryDiv").html('<div class="col-md-6"><div class="form-group"><label>Sub Category: <span class="text-danger">*</span></label><select name="category"  data-placeholder="Select Type First" class="form-control required category subCategory">'+categories+'</select></div>');   
                            }
                        } else {
                            $(".subCategory").empty();
                            $("#subCategoryDiv").hide();
                        }
                    }
                });
            }
        });
        
        $('#finish').css('display', 'none');
    </script>
@endsection
