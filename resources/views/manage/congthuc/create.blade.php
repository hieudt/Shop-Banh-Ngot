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
                    <h3 class="box-title">Thêm mới công thức</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="ctForm">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Tên Nguyên Liệu</label>
                                <select class="form-control select2" name="id_nguyenlieu" id="id_nguyenlieu">
                                    @foreach ($data as $nl)
                                    <option value="{{ $nl->id }}">{{ $nl->ten }} | Đơn vị : {{ $nl->donvi }} | Còn lại :
                                        {{ $nl->soluong }}</option>
                                    @endforeach
                                </select>
                                <label for="">Tên Sản Phẩm</label>
                                <select class="form-control select2" name="id_sanpham" id="id_sanpham">
                                    @foreach ($SP as $nl)
                                    <option value="{{ $nl->id }}">{{ $nl->ten }}</option>
                                    @endforeach
                                </select>
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
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset('admin/js/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/js/additional-methods.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/congthuc.js') }}"></script>
<script>
    $(document).congthuc({
        fetchUrl : '',
        postUrl : '{{route('congthuc.store')}}', 
    })
    $('.select2').select2()
</script>
@endsection