@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="box">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('product.store')}}" role="form" method="POST" 
            enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên sản phẩm</label>
                  <input type="text" value="{{old('name')}}" name="name" class="form-control"  
                  placeholder="Tên sản phẩm">
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Danh mục</label>
                  <select name="category_id" id="input" class="form-control" required="required">
                    @foreach ($category as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thương hiệu</label>
                  <select name="brand_id" id="input" class="form-control" required="required">
                    @foreach ($brand as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giá</label>
                  <input type="text" value="{{old('price')}}" name="price" class="form-control"  
                  placeholder="Giá sản phẩm">
                  @error('price')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giá khuyến mãi</label>
                  <input type="text" value="{{old('sale_price') ? old('sale_price') : 0 }}" name="sale_price" class="form-control" 
                  placeholder="Giá khuyến mãi">
                  @error('sale_price')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Số lượng</label>
                  <input type="number" value="{{old('quantity')}}" name="quantity" class="form-control" 
                  placeholder="Nhập số lượng">
                  @error('quantity')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trạng thái</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="input" value="1" checked="checked">
                      Hiện
                    </label>
                    <label>
                      <input type="radio" name="status" id="input" value="0" >
                      Ẩn
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Mô tả sản phẩm</label>
                  <textarea id="mytextarea" name="description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" d="" name="image" placeholder="Input field" 
                    class="@error('name') is-invalid @enderror form-control">
                     @error('image')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>  
                <div class="form-group">
                  <label for="">Ảnh mô tả sản phẩm</label>
                  <input type="file" d="" name="images[]" placeholder="Input field" 
                  class="@error('name') is-invalid @enderror form-control" multiple>
                   
              </div>  
                  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
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