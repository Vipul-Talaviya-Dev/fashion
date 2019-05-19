@extends('admin.layouts.main')
@section('title')
    ContactData Imports
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Import Contact List</li>
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
                        <h1 class="panel-title">
                            Import Contact List

                            <a href="{{ route('admin.contantImportForm') }}" class="btn btn-primary pull-right"> Contact Import
                            </a>
                        </h1>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="content">
                            <div class="panel panel-flat">
                                <form class="form-horizontal">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <input type="text" class="form-control" name="search"
                                               value="{{ request()->get('search') }}" placeholder="Search" autocomplete="off">
                                    </div>
                                    <div class="col-md-1"><a href="{{ route('admin.contantImports') }}" class="btn btn-labeled btn-rounded btn-info" style="margin-top: 20px;"><b><i class="icon-reset"></i></b> Rrefresh</a></div>
                                </form>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Mobile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($contactDataImports))
                                        @foreach($contactDataImports as $key => $contactDataImport)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $contactDataImport->mobile }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $contactDataImports->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--vfsdf--}}
        </div>
        <!-- /content area -->

        @endsection
        @section('js')
            <script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
            <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="/assets/js/core/app.js"></script>
            <script type="text/javascript" src="/assets/js/pages/datatables_api.js"></script>
            <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
            <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
@endsection
