@extends('manage.master')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách sản phẩm</h3>
                    <a href="{{ route('sanpham.create') }}" class="btn btn-success">Thêm mới</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="order-listing" style="width:100%" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên SP</th>
                                <th>Hình ảnh</th>
                                <th>Giá bán</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('components/backend/js/general.js') }}"></script>
<script src="{{ asset('components/backend/js/sanpham.js') }}"></script>
<script>
    $(document).sanpham({
        fetchUrl : '{{route('sanpham.fetch')}}', 
    })
</script>
@endsection