
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

     <!-- Center navbar links -->
     <!-- <ul class="navbar-nav mx-auto">-->
    <ul class="navbar-nav flex-fill justify-content-center">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">{{$title}}</a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
      @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}(
                    @if (Auth::check())
                    {{ App\Models\Role::find(Auth::user()->role_id)->name}}                                        
                    @endif
                    )
                </a>                                    
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              </li>
      @endguest

      <!-- Notifications Dropdown Menu -->    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->


  @include('admin.warehouse.slidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <br>    
        @include('admin.alert')    
      

        @yield('content')

       
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2022 <a href="#">Admin</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
  <i class="fas fa-chevron-up"></i>
</a>

@include('admin.footer')

@yield('handle')
</body>
</html>
