@extends('admin.layouts.main')
@section('title' , 'Offers')
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Offers</li>
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
                        <h1 class="panel-title">Offers</h1>
                    </div>
                    <hr/>
                    <!-- Single row selection -->
                    <div class="container-fluid">
                        <div class="content">
                            <a href="{{ route('admin.offer.add') }}">
                                <button class="btn btn-info pull-right"
                                        style="margin-right: 20px; margin-top: 20px;"><i
                                            class="icon-plus22 position-left"></i>ADD
                                </button>
                            </a>
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search"
                                               value="{{ request()->get('search') }}" placeholder="Search">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="reset" class="btn btn-labeled btn-rounded btn-info"
                                                style="margin-top: 20px;"><b><i class="icon-reset"></i></b> Rrefresh
                                        </button>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Offer Code</th>
                                        <th>Discount</th>
                                        <th>Start Date</th>
                                        <th>End date</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($offers))
                                        @foreach($offers as $key => $offer)
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $offer->name }}</td>
                                            <td>{{ $offer->offer_code }}</td>
                                            <td>{{ $offer->discount }} %</td>
                                            <td>{{ date('d-m-Y',strtotime($offer->start_date ))}}</td>
                                            <td>{{ date('d-m-Y',strtotime($offer->end_date)) }}</td>
                                            @if($offer->status==1)
                                                <td><span class="label label-success">Active</span></td>
                                            @else
                                                <td><span class="label label-default">In-Active</span></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ route('admin.offer.edit', ['id' => $offer->id]) }}"><i class="icon-pencil5"></i> Edit</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $offers->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/datatables_api.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/uploaders/fileinput.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/uploader_bootstrap.js"></script>
@endsection
