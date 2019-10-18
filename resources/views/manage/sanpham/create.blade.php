@extends('manage.master')
@section('css')
<style>
    .error {
        color: red;
    }
</style>
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap3-wysihtml5.min.css') }}">
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
                    <h3 class="box-title">Thêm mới sản phẩm</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="spForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Tên Sản phẩm</label>
                                <input type="text" class="form-control" name="ten" id="ten" placeholder="Bánh Kem">
                                <span class="text-danger">{{ $errors->first('ten') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Bán</label>
                                <input type="text" name="giaban" id="giaban" class="form-control" placeholder="100000">
                                <span class="text-danger">{{ $errors->first('giaban') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="textarea" placeholder="Nhập nội dung tại đây" name="description"
                                    id="description"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input type="file" id="image" name="image">
                                <span class="text-danger">{{ $errors->first('image') }}</span>
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
<script src="{{ asset('admin/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/sanpham.js') }}"></script>
<script>
    $(document).sanpham({
        fetchUrl : '',
        postUrl : '{{route('sanpham.store')}}', 
    })
    // CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
</script>
@endsection