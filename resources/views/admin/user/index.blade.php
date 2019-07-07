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
                            <div class="form-group col-md-4">
                                <label>Search</label>
                                <input type="text" name="search" class="form-control" placeholder ="Search for Name, Email, Mobile, Member Ship Code" autocomplete="off" value="{{ request('search') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Birth Date</label>
                                <input type="text" name="birthDate" id="birthDate" class="form-control" required="required" value="{{ request('birthDate') }}" autocomplete="off" readonly placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Anniversary Date</label>
                                <input type="text" name="anniversaryDate" id="anniversaryDate" class="form-control" required="required" value="{{ request('anniversaryDate') }}" autocomplete="off" readonly placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Only Members</label>
                                <input type="checkbox" name="onlyMember" class="form-control" value="1" {{ request('onlyMember') == 1 ? 'checked' : '' }} style="height: 22px;">
                            </div>
                            <div class="form-group col-md-2">
                                <p>&nbsp;</p>
                                <button class="btn btn-info" type="submit" style="margin-top: -5px;">Search</button> &nbsp;
                                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-warning" style="margin-top: -5px;"><i class="fa fa-refresh"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div class="panel panel-flat">
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                        @if(count($users) > 0)
                                            @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->birth_date ? App\Helper\Helper::dateFormat($user->birth_date) : 'N/A' }}</td>
                                                <td>{{ $user->anniversary_date ? App\Helper\Helper::dateFormat($user->anniversary_date) : 'N/A' }}</td>
                                                <td>
                                                    @if($user->member_ship_code)
                                                        {{ $user->member_ship_code }}
                                                    @else
                                                        <a href="{{ route('admin.user.generateMemberShipCode', ['id' => $user->id]) }}" class="btn btn-sm btn-info">Generate Member Ship Code</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->member_ship_code)
                                                        {{ $user->login_count }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td>{{ App\Helper\Helper::dateFormat($user->created_at) }}</td>
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
                                        @else
                                            <tr>
                                                <th colspan="10" class="text-center"> Data Not Found</th>
                                            </tr>
                                        @endif
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
                $("#birthDate").datepicker({
                    todayBtn: 1,
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                });
                $("#anniversaryDate").datepicker({
                    todayBtn: 1,
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                });
                $("body").on("click", ".statuChange", function() {
                    var id = $(this).attr('data-id');
                    var status = $(this).attr('data-status');
                    var msg = '';
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