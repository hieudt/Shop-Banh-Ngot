@extends('manage.master')
@section('css')
<style>
    .error {
        color: red;
    }
</style>
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
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
                    <h3 class="box-title">Thêm mới nguyên liệu</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="nlForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nguyên liệu</label>
                            <input type="text" class="form-control" id="ten" placeholder="Đường" name="ten">
                            <span class="text-danger">{{ $errors->first('ten') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Đơn vị</label>
                            <input type="text" name="donvi" class="form-control" id="donvi" placeholder="KG">
                            <span class="text-danger">{{ $errors->first('donvi') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng</label>
                            <input type="text" name="soluong" id="soluong" class="form-control" placeholder="10">
                            <span class="text-danger">{{ $errors->first('soluong') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Đơn giá</label>
                            <input type="text" name="dongia" id="dongia" class="form-control" placeholder="100000">
                            <span class="text-danger">{{ $errors->first('dongia') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" id="image" name="image">
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
<script src="{{ asset('components/backend/js/nguyenlieu.js') }}"></script>
<script>
    $(document).nguyenlieu({
        fetchUrl : '',
        postUrl : '{{route('nguyenlieu.store')}}', 
    })
</script>
@endsection