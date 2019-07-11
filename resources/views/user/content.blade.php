@extends('user.layouts.main')

@section('title')
{{ $content->name }}
@endsection
@section('css')
<style type="text/css">
	.row {
	    margin-right: 0;
	    margin-left: 0;
	}
</style>
@endsection

@section('content')
<p><br></p>
<div class="row" style="background-color: #f3f3f3;">
<p><br></p>
	<div class="col-md-1"></div>
	<div class="col-md-10">
		{!! $content->content !!}
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-12 col-sm-12 col-xs-12"><p><br><br></p></div>
</div>
@endsection