@extends('admin.layouts.main')
@section('title', 'sub Admins')
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
                        <h1 class="panel-title">
                            Sub Admins
                            <a href="{{ route('admin.subAdmin.add')  }}" class="btn btn-info pull-right text-white">ADD NEW</a>
                        </h1>
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
                                        <!-- <th>Modules</th> -->
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subAdmins as $key => $subAdmin)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $subAdmin->name }}</td>
                                                <td>{{ $subAdmin->email }}</td>
                                                <!-- <td>{{ $subAdmin->modules_id }}</td> -->
                                                <td class="text-center">
                                                    <a href="{{ route('admin.subAdmin.edit', ['id' => $subAdmin->id]) }}"> Edit</a>
                                                    |
                                                    <a class="delete" data-id="{{ $subAdmin->id }}" href="javascript:void(0);" > Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        $("body").on("click", ".delete", function() {
            var value = $(this).attr('data-status');
            var id = $(this).attr('data-id');
            swal({
              title: "Are you sure?",
              text: "It will permanently deleted !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!',
              closeOnConfirm: false
            }, function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Status!',
                  text: 'Sub Admin has been Delete successfully..',
                  type: 'success'
                }, function() {
                   $.ajax({
                      type: 'GET',
                      url: "{{ route('admin.subAdmin.delete') }}",
                      data: {'id': id},
                      dataType: "json",
                      success: function(res) {
                        if(res.status === true) {
                            location.reload();
                        }
                      }
                    });
                });
              } else {
                swal("Cancelled", "Your record is safe :)", "error");
              }
            })
        });
    });
</script>
@endsection
