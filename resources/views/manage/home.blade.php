@extends('manage.master')
@section('content')
    <section class="content-header">
      <h1>
        Trang tổng quan
        <small>Version 2.0</small>
      </h1>
    </section>
    <section class="content">
<!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                <span class="">Đơn trong ngày</span>
                <span class="info-box-number">{{$donTrongNgay}} Đơn</span>
                <span class="info-box-number">{{$donTrongNgayNot}} Chưa xử lý</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                <span class="">Đơn trong tháng</span>
                <span class="info-box-number">{{$donTrongThang}} Đơn</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                <span class="">$ Trong ngày</span>
                <span class="info-box-number">{{ $tongTien }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                <span class="">$ Trong tháng</span>
                <span class="info-box-number">{{ $tongTienMonth }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection