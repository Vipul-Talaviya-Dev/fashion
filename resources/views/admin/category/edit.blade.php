@extends('admin.layouts.main')
@section('title', 'category Edit')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ 'admin.dashboard' }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Category Update</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-flat">
                    <div class="panel-heading"><h1 class="panel-title">Category Update</h1></div><hr/>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="panel-body">
                                @if(isset($category))
                                    <form id="product" class="form-horizontal form-validate-jquery"
                                          action="{{ route('admin.category.update', $category->id) }}"
                                          method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <fieldset class="content-group">
                                            @if($category->parent)
                                            <div class="form-group col-xs-4 col-sm-4 col-md-4 {{ $errors->has('parentId') ? 'has-error' : ''  }}" style="display: none;">
                                                <label for=""><span style="color: red;">*</span> Main Category:</label>
                                                <select name="parentId" class="form-control input-sm">
                                                    <option value="">-- Select Main Category --</option>
                                                    @foreach($mainCategories as $mainCategory)
                                                    <option value="{{ $mainCategory->id }}" {{ $mainCategory->id == $category->parent_id ? 'selected' : '' }}>{{ $mainCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @foreach($errors->get('parentId') as $error)
                                                <span class="help-block">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                            @endif
                                        </fieldset>
                                        <fieldset class="content-group">
                                            <div class="form-group">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-2">
                                                    <label class="control-label">Category <span
                                                                class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" name="name" id="category"
                                                           value="{{ $category->name }}" class="form-control"
                                                           placeholder="Enter Category Name" autocomplete="off">
                                                    @if($errors->get('name'))
                                                        @foreach($errors->get('name') as $error)
                                                            <span style="color: red;">{{$error}}</span>
                                                        @endforeach
                                                    @endif
                                                    <div id="ucategory"></div>
                                                </div>
                                                <div class="col-lg-3"></div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="content-group">
                                            <div class="form-group">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="control-label">Status</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" @if($category->status == '1') checked
                                                               @endif name="status" class="styled"
                                                               value="1">
                                                        Active
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="2"
                                                               @if($category->status == '2') checked
                                                               @endif class="styled">
                                                        In-Active
                                                    </label>
                                                </div>
                                                @if($errors->get('status'))
                                                    @foreach($errors->get('status') as $error)
                                                        <span style="color: red;"><i class="fa fa-times-circle"></i> &nbsp;{{$error}}</span>
                                                    @endforeach
                                                @endif
                                                <div class="col-lg-3"></div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="content-group">
                                            <div class="form-group">
                                                <div class="col-lg-5">
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-primary">Save <i
                                                                class="icon-arrow-right14 position-right"></i>
                                                    </button>
                                                </div>
                                                <div class="col-lg-3">
                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
       