@extends('admin.layouts.main')
@section('title', 'Category Add')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-flat">
                <div class="panel-heading"><h1 class="panel-title">Category</h1></div><hr/>
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" action="{{ route('admin.category.create') }}" method="post" >
                                {{ csrf_field() }}
                                <fieldset class="content-group">
                                    <div class="form-group">
                                        <div class="col-lg-3">
                                            <label class="control-label">Main Category</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <select data-placeholder="Select a type..."
                                            class="select-results-color form-control category" name="parent_id">
                                            <option value="">-- Select Main Category --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="subCategoryDiv" style="display: none;">
                                        <div class="col-lg-3">
                                            <label class="control-label">Sub Category</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <select data-placeholder="Select a Sub Category..."
                                            class="select-results-color form-control" id="subCategory" name="parent_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label class="control-label">Category Name<span
                                            class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" name="name" id="category"
                                            value="{{ old('name') }}" class="form-control"
                                            placeholder="Enter Category Name" autocomplete="off"> 
                                            @if($errors->get('name'))
                                            @foreach($errors->get('name') as $error)
                                            <span style="color: red;">{{$error}}</span>
                                            @endforeach
                                            @endif
                                            <div id="ucategory"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3">
                                            <label class="control-label">Status</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <label class="radio-inline">
                                                <input type="radio" checked name="status" class="styled"
                                                value="1">
                                                Active
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="status"
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

                                        <div class="form-group">
                                            <div class="col-lg-3">
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-info">Submit <i
                                                    class="icon-arrow-right14 position-right"></i></button>
                                                    <button type="reset" class="btn btn-default" id="reset">Reset <i
                                                        class="icon-reload-alt position-right"></i></button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
                
    @section('js')
    <script type="text/javascript">
        $('body').on('change', '.category', function () {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('api.subCategory') }}',
                    data: {'id': id, '_token': "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#subCategory').empty();
                        if (data.status) {
                            if(data.categories.length > 0) {
                                $("#subCategoryDiv").show();
                                $("#subCategory").empty();
                                $("#subCategory").append('<option value="">Select A SubCategory</option>');
                                $.each(data.categories, function (key, value) {
                                    $("#subCategory").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                                });
                            }
                        } else {
                            $("#subCategory").empty();
                            $("#subCategoryDiv").hide();
                        }
                    }
                });
            } else {
                $("#subCategoryDiv").hide();
            }
        });
    </script>
    @endsection

