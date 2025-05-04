<?php
$activeUrl = $_GET['url'] ?? ''; // Get the current URL parameter or default to 'home'
session_start();
?>
<style>
  /* Navbar Styling */
  .main-header.navbar {
    background-color: #17a2b8 !important;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }

  .main-header .nav-link {
    color: white !important;
    font-weight: 500;
  }

  .main-header .nav-link:hover {
    color: #d4f1f9 !important;
  }

  .navbar-badge {
    font-size: 0.7rem;
    top: 4px;
  }

  /* Sidebar Styling */
  .main-sidebar {
    background-color: #138496 !important;
  }

  .brand-link {
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  }

  .user-panel .info span {
    color: white;
    font-weight: bold;
  }

  .nav-sidebar .nav-item > .nav-link {
    color: #e0f7fb;
    transition: background-color 0.2s ease;
  }

  .nav-sidebar .nav-link.active {
    background-color: #17a2b8;
    color: white;
    font-weight: bold;
  }

  .nav-sidebar .nav-link:hover {
    background-color: #1bb3cc;
    color: white;
  }

  .nav-icon {
    color: white;
  }

  .nav-header {
    font-size: 0.9rem;
    color: #ffffffb3;
    margin-top: 8px;
    letter-spacing: 1px;
  }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info navbar-dark bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link text-white" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Message List -->
                <!-- ... (tetap seperti aslinya) ... -->
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link text-white" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Notification List -->
                <!-- ... (tetap seperti aslinya) ... -->
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex justify-content-center align-items-center">
        <span class="brand-text font-weight-bold text-white" style="font-size: 1.25rem; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">
            <i class="fas fa-store-alt mr-2"></i>POS Kelompok 14
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center justify-content-center text-white">
            <div class="info d-flex align-items-center">
                <i class="mr-2 fas fa-user-circle me-2 fa-2x"></i>
                <span style="font-size: 1.5rem;">
                    <?= $_SESSION['username'] ?? 'Guest' ?>
                </span>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-white">LIST MENU</li>
                <li class="nav-item">
                    <a href="./?url=dashboard" class="nav-link <?php echo $activeUrl === 'dashboard' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=jenis" class="nav-link <?php echo $activeUrl === 'jenis' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Jenis Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=produk" class="nav-link <?php echo $activeUrl === 'produk' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kategori" class="nav-link <?php echo $activeUrl === 'kategori' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Kategori Tokoh</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=testimoni" class="nav-link <?php echo $activeUrl === 'testimoni' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Testimoni</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>