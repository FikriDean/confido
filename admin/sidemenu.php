<?php $linkz="http://".$_SERVER['SERVER_NAME']."/pacific-main/admin/"; ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <?php
               $url = $_SERVER['PHP_SELF'];
               $url = explode('/', $url);
               $lastPart = array_pop($url);
               if($lastPart=="index.php"){
                  echo '<a href="./../" class="nav-link">';
               }else{
                  echo '<a href="../../" class="nav-link">';
               }
                ?>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Landing Page 
              </p>
            </a>
          </li>
          <li class="nav-header">MENUS</li>
          <li class="nav-item menu-open">
            <a href="<?php echo $linkz; ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/harga.php" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Harga
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/pesanan.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pesanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Riwayat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $linkz; ?>view/riwayat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $linkz; ?>view/order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/riwayat.php" class="nav-link">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Riwayat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/keluhan.php" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Keluhan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $linkz; ?>view/profile.php" class="nav-link">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->