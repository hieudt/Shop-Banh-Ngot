@extends('manage.master')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap3-wysihtml5.min.css') }}">

@endsection
@section('content')
<section class="content-header">
    <h1>
    Đơn hàng 
    <small>#{{$HD->id}}</small>
    </h1>
</section>

<div class="pad margin no-print">
    <div class="alert alert-success alert-block" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Cập nhật thành công</strong>
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
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
    <?php $tongtien = 0; ?>
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
<div class="clearfix"></div>
<section class="invoice">


@endsection
@section('javascript')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/hoadonnhap.js') }}"></script>
<script>
    $(document).hoadonnhap({
        fetchUrl : '{{route('hoadonnhap.fetch')}}', 
        updateUrl: '{{route('hoadon.update')}}',
    })
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.editor1').wysihtml5()
  })
</script>
@endsection