<?php
  $menus = config('menu');
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link mb-3 ">
      <img src="<?php echo e(asset('adminstyle/admin/dist/img/furniture-logo-980x980.jpg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản Lý Kho Hàng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo e(url('admin/warehouse/home')); ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Trang chủ</p>       
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/warehouse/product/list')); ?>" class="nav-link">
              <i class="nav-icon fas fa-couch"></i>
              <p>
                Quản lý sản phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/product/list')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phảm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/product/add')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/warehouse/supplier/list')); ?>" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Quản lý nhà cung cấp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/supplier/list')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhà cung cấp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/supplier/add')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm nhà cung cấp</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(url('admin/warehouse/orders/list')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Quản lý xuất kho
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/orders/list')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phiếu xuất kho</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/orders/add')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lập phiếu xuất kho</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(url('admin/warehouse/purchase/list')); ?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Quản lý nhập kho
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/purchase/list')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phiếu nhập</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('admin/warehouse/purchase/add')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lập phiếu nhập</p>
                </a>
              </li>
            </ul>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/slidebar.blade.php ENDPATH**/ ?>