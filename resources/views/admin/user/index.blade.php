@extends('admin.layouts.main')
@section('title', 'Users')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Users</li>
        </ul>
    </div>
</div>
@endsection

@section('css')
<style>
    .form-control::-webkit-input-placeholder {
        color: #fff;
    }
</style>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        User List
                        <a href="{{ route('admin.user.add')  }}" class="btn btn-info pull-right text-white">ADD NEW</a>
                    </h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="row">
                        <form method="get">
                            <div class="form-group col-md-4"style="margin-left: 23px;">
                                <label>Search</label>
                                <input type="text" name="search" class="form-control" placeholder ="Search for email" autocomplete="off" value="{{ request('search') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <p>&nbsp;</p>
                                <button class="btn btn-info" type="submit" style="margin-top: -5px;">Search</button>
                                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div class="panel panel-flat">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Birth Date</th>
                                            <th>Anniversary Date</th>
                                            <th>Member Ship Code</th>
                                            <th>Member Login Count</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->birth_date ? date('d-m-Y', strtotime($user->birth_date)) : 'N/A' }}</td>
                                            <td>{{ $user->anniversary_date ? date('d-m-Y', strtotime($user->anniversary_date)) : 'N/A' }}</td>
                                            <td>{!! $user->member_ship_code ? $user->member_ship_code : 'N/A' !!}</td>
                                            <td>
                                                @if($user->member_ship_code)
                                                    {{ $user->login_count }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            @if($user->status == 1)
                                            <td>
                                                <a href="javascript:void(0);" class="statuChange" data-status="1" data-id="{{ $user->id }}"><span class="label label-success">Active</span></a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="javascript:void(0);" class="statuChange" data-status="2" data-id="{{ $user->id }}"><span class="label label-default">In-Active</span></a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="pull-right">
                            {!! 
                                $users->appends([
                                'search' => request('search')
                                ])->render() 
                            !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").on("click", ".statuChange", function() {
                    var id = $(this).attr('data-id');
                    var status = $(this).attr('data-status');
                    var msg = ''
                    if(status == 1) {
                        msg = 'This User has De-Activated.';
                    } else {
                        msg = 'This User has Activated.';
                    }
                    swal({
                        title: "Are you sure?",
                        text: msg,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, I am sure!',
                        cancelButtonText: "No, cancel it!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                     },
                     function(isConfirm) {
                         // swal("Shortlisted!", "Candidates are successfully shortlisted!", "success");
                       if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('admin.user.changeStatus') }}',
                                data: {'id': id, '_token': "{{ csrf_token() }}"},
                                success: function (data) {
                                    if (data.status) {
                                        swal("Success!", data.message, "success");
                                        window.location.reload();
                                    } else {
                                        swal("Error!", "Internal Server Error.", "error");
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endsection