@extends('manage.master')
@section('css')
<style>
    .error {
        color: red;
    }
</style>
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-success alert-block" style="display:none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Thêm mới thành công</strong>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới hóa đơn nhập</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="ctForm">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Đại Lý</label>
                                <select class="form-control select2" name="id_daily" id="id_daily">
                                    <option disabled selected value> -- Chọn Đại Lý -- </option>
                                    @foreach ($DL as $dai)
                                    <option value="{{ $dai->id }}">{{ $dai->ten_dai_ly }} | SĐT : {{ $dai->so_dien_thoai }} | Địa chỉ :
                                        {{ $dai->dia_chi }}</option>
                                    @endforeach
                                </select>
                                <label for="">Tên Nguyên Liệu</label>
                                <select class="form-control select2" name="id_nguyenlieu" id="id_nguyenlieu">
                                    <option disabled selected value> -- Chọn Nguyên Liệu -- </option>
                                    @foreach ($data as $nl)
                                    <option
                                        value="{{ $nl->id }}"
                                        ten="{{$nl->ten}}"
                                        image="{{$nl->image}}">{{ $nl->ten }} | Đơn vị : {{ $nl->donvi }} | Còn lại :
                                        {{ $nl->soluong }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đơn Giá</label>
                                    <input type="text" name="thanhtien" id="thanhtien" class="form-control"
                                        placeholder="10">
                                    <span class="text-danger">{{ $errors->first('thanhtien') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng</label>
                                    <input type="text" name="soluong" id="soluong" class="form-control"
                                        placeholder="10">
                                    <span class="text-danger">{{ $errors->first('soluong') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="addProduct" class="btn btn-primary">Thêm sản phẩm</button>
                        <button type="submit" class="btn btn-primary">Lập Hóa Đơn</button>
                    </div>
                </form>
                <input type="hidden" id="nl_image" value="">
                <input type="hidden" id="nl_ten" value="">
                <input type="hidden" id="nl_id" value="">
            </div>
        </div>
    </div>
    <div class="row" id="cart" style="display: none;">

    </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset('admin/js/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/js/additional-methods.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/hoadonnhap.js') }}"></script>
<script>
    $(document).hoadonnhap({
        fetchUrl : '',
        postUrl : '{{route('hoadonnhap.store')}}',
        baseUrl: '{{url('/')}}',
    })
    $('.select2').select2()
</script>
@endsection