<?php
  $menus = config('menu');
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link mb-3 ">
      <img src="{{asset('adminstyle/admin/dist/img/furniture-logo-980x980.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          @if (Auth::user()->id == 2)
            @foreach ($menus as $key => $menu)
              @if (isset($menu['id']))
                <li class="nav-item">
                  <a href="{{url($menu['route'])}}" class="nav-link">
                    <i class="nav-icon fas  {{$menu['icon']}}"></i>
                    <p>              
                      {{$menu['label']}}
                      @if (isset($menu['items']))
                        <i class="right fas fa-angle-left"></i>
                      @endif                
                    </p>
                  </a>
                  @if (isset($menu['items']))
                  <ul class="nav nav-treeview">
                    @foreach ($menu['items'] as $item)
                    <li class="nav-item">
                      <a href=" {{url($item['route'])}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> {{$item['label']}}</p>
                      </a>
                    </li>  
                    @endforeach  
                  </ul>
                  @endif   
                </li>       
              @endif    
            @endforeach
            <li class="nav-item">
              <a href="{{url('admin/customer/list')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Quản lý khách hàng
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/customer/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách khách hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/customer/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm khách hàng</p>
                  </a>
                </li>
              </ul>
            </li>

          @else
            @foreach ($menus as $key => $menu)
            <li class="nav-item">
              <a href="{{url($menu['route'])}}" class="nav-link">
                <i class="nav-icon fas  {{$menu['icon']}}"></i>
                <p>              
                  {{$menu['label']}}
                  @if (isset($menu['items']))
                    <i class="right fas fa-angle-left"></i>
                  @endif                
                </p>
              </a>
              @if (isset($menu['items']))
              <ul class="nav nav-treeview">
                @foreach ($menu['items'] as $item)
                <li class="nav-item">
                  <a href=" {{url($item['route'])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> {{$item['label']}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>
            @endforeach          
          @endif
         
          
        

          {{-- @foreach ($menus as $key => $menu)
          <li class="nav-item">
            <a href="{{url($menu['route'])}}" class="nav-link">
              <i class="nav-icon fas  {{$menu['icon']}}"></i>
              <p>              
                {{$menu['label']}}
                @if (isset($menu['items']))
                  <i class="right fas fa-angle-left"></i>
                @endif                
              </p>
            </a>
            @if (isset($menu['items']))
            <ul class="nav nav-treeview">
              @foreach ($menu['items'] as $item)
              <li class="nav-item">
                <a href=" {{url($item['route'])}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{$item['label']}}</p>
                </a>
              </li>
              @endforeach

            </ul>
            @endif
          </li>
          @endforeach           --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>