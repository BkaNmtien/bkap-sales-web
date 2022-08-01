@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý danh mục thương hiệu
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
              <h3 class="box-title">Thêm mới thương hiệu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('brand.store')}}" role="form" method="POST" 
            enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" 
                  placeholder="Tên thương hiệu">
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" d="" name="logo" placeholder="Input field" 
                    class="@error('name') is-invalid @enderror form-control">
                     @error('logo')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
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