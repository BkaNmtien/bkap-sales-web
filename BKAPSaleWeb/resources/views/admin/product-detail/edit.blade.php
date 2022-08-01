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
              <h3 class="box-title">Sửa ảnh mô tả</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('product-detail.update', $product_detail->id)}}" role="form" method="POST" 
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <input type="hidden" name="id" value="{{$product_detail->id}}">
              <div class="box-body">
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" d="" name="images" placeholder="Input field" 
                    class="@error('name') is-invalid @enderror form-control">
                     @error('images')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                     <img src="{{url('uploads/product-detail')}}/{{$product_detail->images}}" alt="" width="100px">
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