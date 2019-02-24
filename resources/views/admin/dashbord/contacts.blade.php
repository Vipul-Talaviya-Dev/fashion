@extends('admin.layouts.main')
@section('title', 'Contacts')
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
                    <h1 class="panel-title">Contacts</h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="content">
                        <div class="panel panel-flat">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->mobile }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {!! $contacts->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
