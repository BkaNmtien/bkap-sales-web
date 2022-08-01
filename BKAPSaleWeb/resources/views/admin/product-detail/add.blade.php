@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý ảnh mô tả sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="box">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới ảnh mô tả</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('product-detail.store')}}" role="form" method="POST" 
            enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <select name="product_id" id="input" class="form-control" required="required">
                    <option value="{{$product_id}}">{{$product->name}}</option>        
                </select>
              </div>
            </div>
              <div class="box-body">
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" d="" name="images" placeholder="Input field" 
                    class="@error('name') is-invalid @enderror form-control">
                     @error('images')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>       
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@stop

@section('script-tiny')
<script src="{{url('asset-admin')}}/tinymce/tinymce.min.js"></script>
<script src="{{url('asset-admin')}}/tinymce/config.js"></script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
@stop