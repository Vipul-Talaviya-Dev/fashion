@extends('admin.layouts.main')

@section('title')
    Product Create panel
@endsection

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
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">Product</h6>
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
    {{--<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>--}}
    {{--<script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>--}}
    <script type="text/javascript" src="/assets/js/plugins/forms/wizards/stepy.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
    {{--<script type="text/javascript" src="/assets/js/core/libraries/jasny_bootstrap.min.js"></script>--}}
    <script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/wizard_stepy.js"></script>
    <script type="text/javascript" src="/assets/js/cloudinary_widget.js"></script>
    <script>

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
        $('body').on('change', '#type', function () {
            var type = $('#type').val();
            if ('#type') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.category.change') }}',
                    data: {'type': type, '_token': "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#category').empty();
                        if (data) {
                            $("#category").empty();
                            $("#category").append('<option>Select a category...</option>');
                            $.each(data, function (key, value) {
                                $("#category").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });

                        } else {
                            $("#category").empty();
                        }
                    }
                });
            }
        });
        $('body').on('change', '#category', function () {
            var html = '';
            var category = $('#category').val();
            if ('category') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.attribute.list') }}',
                    data: {'category': category, '_token': "{{ csrf_token() }}"},
                    success: function (data) {
                        console.log(data['attributes']);
                        $('#attributes').empty();
                        if (data['attributes']) {
                            $("#attribute").empty();

                            var i = 0;
                            $.each(data['attributes'], function (key, value) {
                                html += '<div class="col-md-6">';
                                html += '    <div class="form-group">';
                                if (value.require == '1') {
                                    html += '    <label>' + value.name + ':<span class="text-danger">*</span></label>';

                                    html += '    <select class="select form-control" required name="attributeValues[]">';

                                    html += '<option value="">-- Select attribute --</option>';
                                    if (value['attribute_value'].length > 0) {
                                        $.each(value['attribute_value'], function (index, attrvalue) {
                                            html += '    <option value="' + attrvalue.id + '">' + attrvalue.value + '</option>';
                                        });
                                    }
                                    else {
                                        html += '<option value="">-- No attributes available --</option>';
                                    }

                                    html += '    </select>';
                                } else {
                                    html += '    <label>' + value.name + ':</label>';

                                    html += '    <select class="select form-control" name="attributeValues[]">';

                                    html += '<option value="">-- Select attribute --</option>';
                                    if (value['attribute_value'].length > 0) {
                                        $.each(value['attribute_value'], function (index, attrvalue) {
                                            html += '    <option value="' + attrvalue.id + '">' + attrvalue.value + '</option>';
                                        });
                                    }
                                    else {
                                        html += '<option value="">-- No attributes available --</option>';
                                    }

                                    html += '    </select>';
                                }

                                html += '    </div>';
                                html += '    </div>';

                                i++;

                                $(".attr").html(html);
                            });

                        } else {
                            $("#attribute").empty();
                        }
                    }
                });
            }
        });
        $('#finish').css('display', 'none');
    </script>
@endsection
