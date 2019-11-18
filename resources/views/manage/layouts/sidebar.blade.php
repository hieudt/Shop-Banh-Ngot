<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Nhom_Mai_Le</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">
        Chức năng chính
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Hàng Hóa</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('nguyenlieu.index') }}"><i class="fa fa-circle-o"></i>Nguyên Liệu</a></li>
          <li><a href="{{ route('sanpham.index') }}"><i class="fa fa-circle-o"></i>Sản phẩm</a></li>
          <li><a href="{{ route('congthuc.index') }}"><i class="fa fa-circle-o"></i>Công thức</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Đơn Hàng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('hoadon.index') }}"><i class="fa fa-circle-o"></i>Hóa Đơn Xuất</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>