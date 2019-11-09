@extends('admin.layouts.main')
@section('title', 'App Content')
@section('page-header')
<style type="text/css">
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
</style>
@endsection
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
<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h1 class="panel-title">App Content</h1>
                </div>
                <hr/>
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
                    <form class="form-horizontal form-validate-jquery" action="{{ route('admin.appContentUpdate') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input type="email" name="support_email" value="{{ $content->support_email ?: old('support_email') }}" class="form-control" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mobile: <span class="text-danger">*</span></label>
                                <input type="text" name="support_mobile" value="{{ $content->support_mobile ?: old('support_mobile') }}" class="form-control" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>address: <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ $content->address ?: old('address') }}" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>FaceBook Link:</label>
                                <input type="url" name="fb_link" value="{{ $content->fb_link ?: old('fb_link') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Instagram Link:</label>
                                <input type="url" name="instagram_link" value="{{ $content->instagram_link ?: old('instagram_link') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Twitter Link:</label>
                                <input type="url" name="twitter_link" value="{{ $content->twitter_link ?: old('twitter_link') }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Google Link:</label>
                                <input type="url" name="google_link" value="{{ $content->google_link ?: old('google_link') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Delivery Charge:</label>
                                <input type="text" name="delivery_charge" value="{{ $content->delivery_charge ?: old('delivery_charge') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Offer Text:</label>
                                <input type="text" name="offer_text" value="{{ $content->offer_text ?: old('offer_text') }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Meber ship code use: </label> &nbsp;&nbsp;
                                <input type="checkbox" name="member_ship" value="1" {{ ($content->member_ship) ? 'checked' : '' }}><br>
                                <span>Member ship code use yes or no for all user.</span>
                            </div>
                        </div>
                        <div class="row text-center">
                            <button type="submit" class="btn btn-success ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
