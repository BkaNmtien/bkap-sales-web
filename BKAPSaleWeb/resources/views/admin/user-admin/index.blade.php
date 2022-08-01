@extends('admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách người dùng
       
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                          <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <strong>
                              {{ Session::get('message') }}
                            </strong>
                    </div>
                @endif
                @if(Session::has('err'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{Session::get('err')}}</strong>
                    </div>
                @endif
      <!-- Default box -->
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="box-tools" style="position: revert;">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Phân quyền</th>
                        <th>Tuỳ chọn</th>
                    </tr>
                @foreach($user as $value)  
                <tr>    
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->password }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->address }}</td>
                  <td>
                  @if($value->level == 0)
                    <span class="label label-danger">Khách</span>
                  @else
                    <span class="label label-success">Admin</span>
                  @endif
                  </td>
                  
                  <td>
                    <form action="{{ route('user-admin.update',$value->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if($value->level == 0)
                            <input type="hidden" name="level" value="1">
                            <button style="border:none;background: transparent;" type="submit" class="" title="Admin"><i style="color:#00a65a" class="fa fa-refresh"></i></button>
                        @else
                            <input type="hidden" name="level" value="0">
                            <button style="border:none;background: transparent;" type="submit" class="" title="Khách"><i style="color:#00a65a" class="fa fa-refresh"></i></button>
                        @endif
                    </form>

        
                  <form action="{{ route('user-admin.destroy',$value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="border:none;background: transparent;" type="submit" onclick="return confirm('Bạn có muốn xóa người dùng này không?')" class="" title="Xóa"><i style="color:red" class="fa fa-fw fa-trash-o"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

@stop