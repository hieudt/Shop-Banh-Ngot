<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/_all-skins.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/pace.css') }}">

</head>
<body onload="window.print();">
<div class="wrapper">
<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <?php $tongtien = 0; ?>
    <div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-globe"></i> SHOP HM
        <small class="pull-right"> Ngày : {{ Carbon\Carbon::now() }}</small>
        </h2>
    </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        Địa chỉ đại lý
        <address>
        <strong>{{ $HD->daily->ten_dai_ly }}</strong><br>
        SDT : {{ $HD->daily->so_dien_thoai }}<br/>
        Địa chỉ : {{ $HD->daily->dia_chi }}<br/>
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>Mã đơn hàng #{{ $HD->id }}</b><br>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>Tên NL</th>
            <th>Mã NL</th>
            <th>Thành Tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($HD->chitiet as $item)
            <tr>
                <td> {{ $item->soluong }}</td>
                <td> {{ $item->nguyenlieu->ten }} </td>
                <td> {{ $item->nguyenlieu->id }} </td>
                <td> {{ $item->thanhtien }}</td>
            </tr>
            <?php $tongtien += $item->thanhtien; ?>
        @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
        <p class="lead">Phương thức thanh toán:</p>

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        Ship COD
        </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
        <p class="lead">Thời gian tạo đơn : {{ $HD->created_at }}</p>

        <div class="table-responsive">
        <table class="table">
            <tr>
            <th style="width:50%">Tổng tiền:</th>
            <td> {{$tongtien}} VNĐ</td>
            </tr>
        </table>
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
    <div class="col-xs-12">
        <a href="{{ route('hoadonnhap.print', ['id'=>$HD->id]) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" id="updateStatus" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Cập Nhật
        </button>
    </div>
    </div>
</section>
<!-- /.content -->
</div>