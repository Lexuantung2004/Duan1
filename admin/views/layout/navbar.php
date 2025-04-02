 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
   
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL?>" class="nav-link"><strong>WEBSITE</strong></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL_ADMIN.'?act=logout-admin'?>" onclick="return confirm ('Đăng xuất tài khoản?')">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
      
    
    </ul>
  </nav>

  <!-- /.navbar -->