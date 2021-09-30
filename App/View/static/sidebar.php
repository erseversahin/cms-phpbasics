<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fa fa-users"></i>
        <span class="brand-text font-weight-light">CMS Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image bg-warning d-flex align-items-center justify-content-center m-0 p-2">
                <i class="fa fa-user"></i>
            </div>
            <div class="info">
                <a href="<?= _link('profil') ?>" class="d-block"><?= sess('name'). ' '. sess('surname'); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
<!--        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
-->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= _link('') ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Keşfet
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Müşteriler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= _link('musteri/ekle') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Müşteri Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= _link('musteri/') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tüm Müşteriler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Projeler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= _link('proje/ekle') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proje Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= _link('proje/') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tüm Projeler</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>