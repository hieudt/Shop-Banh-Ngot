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
                    <h3 class="box-title">Thêm mới đại lý</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="ctForm">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Đại Lý</label>
                                    <input type="text" name="ten_dai_ly" id="ten_dai_ly" class="form-control"
                                        placeholder="Thái Bình">
                                    <span class="text-danger">{{ $errors->first('ten_dai_ly') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số Điện Thoại</label>
                                    <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control"
                                        placeholder="84335342425">
                                    <span class="text-danger">{{ $errors->first('so_dien_thoai') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa Chỉ</label>
                                    <input type="text" name="dia_chi" id="dia_chi" class="form-control"
                                        placeholder="84335342425">
                                    <span class="text-danger">{{ $errors->first('dia_chi') }}</span>
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
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/daily.js') }}"></script>
<script>
    $(document).daily({
        fetchUrl : '',
        postUrl : '{{route('daily.store')}}', 
    })
</script>
@endsection