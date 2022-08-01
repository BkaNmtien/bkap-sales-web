@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý ảnh mô tả sản phẩm      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="box">
            <div class="box-header">
              <a href="{{route('product-detail.create')}}?id={{$product_detail[0]->product_id}}" class="btn btn-success">Thêm ảnh mô tả</a>
              @if(Session::has('s'))
              <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{Session::get('s')}}</strong>
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
                  <th>Tên sản phẩm</th>                 
                  <th>Ảnh sản phẩm</th>
                  <th>Tuỳ chọn</th>
                </tr>
                @foreach ($product_detail as $value)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$value->product->name}}</td>                   
                    <td><img src="{{url('uploads/product-detail')}}/{{$value->images}}" 
                      alt="" width="80px"></td>
                    <td>
                        <form action="{{route('product-detail.destroy',$value->id)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <a href="{{route('product-detail.edit', $value->id)}}" class="btn btn-success">Sửa</a>
                          <button type="submit" class="btn btn-danger">Xoá</button>
                        </form>                  
                    </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@stop