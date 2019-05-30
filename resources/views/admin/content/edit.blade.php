@extends('admin.layouts.main')
@section('title')
{{ $content->name }}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/ckeditor/contents.css" />
<style type="text/css">
    .cke_contents {
        height: 450px !important;
    }
    body {
        margin: 0px;
    }
</style>
@endsection

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">{{ $content->name }}</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Default panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">{{ $content->name }}</h5>
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

        <form action="{{ route('admin.content.update', ['id' => $content->id]) }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <label>Description :</label>
                <textarea name="content" id="editor" rows="10" cols="4" class="form-control required" data-placeholder="Enter Details" required>{{ $content->content }}</textarea>
                @foreach($errors->get('content') as $error)
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
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/samples/js/sample.js"></script>
<script type="text/javascript">
    initSample();
</script>
@endsection
