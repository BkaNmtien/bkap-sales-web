@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý danh mục sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <a href="{{route('category.add')}}" class="btn btn-success">Thêm mới danh mục</a>
            @if(Session::has('s'))
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('s')}}</strong>
            </div>
            @endif
            @if(Session::has('err'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('err')}}</strong>
            </div>
            @endif

              <div class="box-tools">
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
                <tbody><tr>
                  <th>STT</th>
                  <th>Tên</th>               
                  <th>Trạng thái</th>
                </tr>
                @foreach ($category as $value)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$value->name}}</td>    
                    <td><span class="label {{$value->status == 1 ? "label-success" : "label-danger"}}">
                      {{$value->status == 1 ? 'Hiện' : 'Ẩn'}}</span></td>
                    <td>
                    <a href="{{route('category.edit',$value->id)}}" class="btn btn-success">Sửa</a>
                    <a href="{{route('category.delete',$value->id)}}" class="btn btn-danger">Xóa</a> 
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