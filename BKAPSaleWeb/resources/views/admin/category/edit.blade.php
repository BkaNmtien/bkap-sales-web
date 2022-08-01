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
     <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới danh mục</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" role="form" method="POST">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" value="{{$category->name}}" class="form-control" 
                  id="exampleInputEmail1" placeholder="Tên sản phẩm">
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="input" value="1" 
                      {{$category->status == 1 ? 'checked' : ''}}>
                      Hiện
                    </label>
                    <label>
                      <input type="radio" name="status" id="input" value="0" 
                      {{$category->status == 0 ? 'checked' : ''}} >
                      Ẩn
                    </label>
                  </div>
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