@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý sản phẩm      
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
              <a href="{{route('product.create')}}" class="btn btn-success">Thêm mới sản phẩm</a>
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
                  <th>Tên</th>
                  <th>Thương Hiệu</th>
                  <th>Danh mục</th>
                  <th>Giá</th>
                  <th>Giá khuyến mãi</th>
                  <th>Số lượng</th>
                  <th>Ảnh sản phẩm</th>
                  <th>Trạng thái</th>
                  <th>Mô tả</th>
                  <th>Tuỳ chọn</th>
                </tr>
                @foreach ($product as $value)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->brand->name}}</td>
                    <td>{{$value->category->name}}</td>
                    <td>{{number_format($value->price,0,".",".")}}đ</td>
                    <td>{{number_format($value->sale_price,0,".",".")}}đ</td>
                    <td>{{$value->quantity}}</td>
                    <td><img src="{{url('uploads/product')}}/{{$value->image}}" 
                      alt="" width="100px"></td>
                    <td><span class="label {{$value->status == 1 ? "label-success" : "label-danger"}}">
                      {{$value->status == 1 ? 'Còn hàng' : 'Hết hàng'}}</span></td>
                    <td>{!!$value->description!!}</td>
                    <td>
                      <form action="{{route('product.destroy',$value->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('product-detail.show',$value->id)}}" class="btn btn-primary">Xem chi tiết</a>
                        <a href="{{route('product.edit', $value->id)}}" class="btn btn-success">Sửa</a>
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