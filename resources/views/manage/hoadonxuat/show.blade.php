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
    <div class="callout callout-info" style="margin-bottom: 0!important;">
    <h4><i class="fa fa-info"></i> Update Trạng thái:</h4>
    <div class="form-group">
      <label for=""></label>
      <select class="form-control" name="" id="">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
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
        Địa chỉ giao hàng
        <address>
        <strong>{{ $HD->ho_tenkh }}</strong><br>
        SDT : {{ $HD->sdt_kh }}<br/>
        Địa chỉ : {{ $HD->diachi_ship }}<br/>
        Chú thích : {{ $HD->chuthich }}<br/>
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
            <th>Tên SP</th>
            <th>Mã SP</th>
            <th>Thành Tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($HD->chitiet as $item)
            <tr>
                <td> {{ $item->soluong }}</td>
                <td> {{ $item->sanpham->ten }} </td>
                <td> {{ $item->sanpham->id }} </td>
                <td> {{ $item->thanhtien }}</td>
            </tr>
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
            <td> {{ $HD->tongtien }} VNĐ</td>
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
        <a href="{{ route('hoadon.print', ['id'=>$HD->id]) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
        </button>
    </div>
    </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
<section class="invoice">

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Chú thích hóa đơn
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
            <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body pad">
        <form>
        <textarea class="textarea" id="editor1" placeholder="Place some text here"
            tyle="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        <button class="btn btn-primary">Gửi</button>
        </form>
    </div>
    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        Ship COD
        </p>
</section>

@endsection
@section('javascript')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/hoadonxuat.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
    $(document).hoadon({
        fetchUrl : '{{route('hoadon.fetch')}}', 
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