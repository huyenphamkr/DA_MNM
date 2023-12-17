<?php
  $menus = config('menu');
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link mb-3 ">
      <img src="<?php echo e(asset('adminstyle/admin/dist/img/furniture-logo-980x980.jpg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Furniture</span>
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <?php if(Auth::user()->id == 2): ?>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(isset($menu['id'])): ?>
                <li class="nav-item">
                  <a href="<?php echo e(url($menu['route'])); ?>" class="nav-link">
                    <i class="nav-icon fas  <?php echo e($menu['icon']); ?>"></i>
                    <p>              
                      <?php echo e($menu['label']); ?>

                      <?php if(isset($menu['items'])): ?>
                        <i class="right fas fa-angle-left"></i>
                      <?php endif; ?>                
                    </p>
                  </a>
                  <?php if(isset($menu['items'])): ?>
                  <ul class="nav nav-treeview">
                    <?php $__currentLoopData = $menu['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                      <a href=" <?php echo e(url($item['route'])); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> <?php echo e($item['label']); ?></p>
                      </a>
                    </li>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </ul>
                  <?php endif; ?>   
                </li>       
              <?php endif; ?>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <a href="<?php echo e(url('admin/customer/list')); ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Quản lý khách hàng
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('admin/customer/list')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách khách hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('admin/customer/add')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm khách hàng</p>
                  </a>
                </li>
              </ul>
            </li>

          <?php else: ?>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <a href="<?php echo e(url($menu['route'])); ?>" class="nav-link">
                <i class="nav-icon fas  <?php echo e($menu['icon']); ?>"></i>
                <p>              
                  <?php echo e($menu['label']); ?>

                  <?php if(isset($menu['items'])): ?>
                    <i class="right fas fa-angle-left"></i>
                  <?php endif; ?>                
                </p>
              </a>
              <?php if(isset($menu['items'])): ?>
              <ul class="nav nav-treeview">
                <?php $__currentLoopData = $menu['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                  <a href=" <?php echo e(url($item['route'])); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> <?php echo e($item['label']); ?></p>
                  </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
          <?php endif; ?>
         
          
        

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/slidebar.blade.php ENDPATH**/ ?>