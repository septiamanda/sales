<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #DE5858;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="/img/logo.png" alt="Logo yee" width="70">
        </div>
        <div class="sidebar-brand-text mx-3">Telkom Indonesia</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master:</h6>
                <a class="collapse-item" href="<?= site_url('listSales')?>">Data Sales</a>
                <a class="collapse-item" href="<?= site_url('listRE') ?>">Data RE</a>
                <a class="collapse-item" href="<?= site_url('listFCC') ?>">Data FCC</a>
                <a class="collapse-item" href="<?= site_url('listPI') ?>">Data PI</a>
                <a class="collapse-item" href="<?= site_url('listPS') ?>">Data PS</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Growth</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (session()->levelId == 1) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Akun</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Akun:</h6>
                    <a class="collapse-item" href="<?= site_url('listA') ?>">Admin</a>
                    <a class="collapse-item" href="<?= site_url('listK') ?>">Karyawan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sektor') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Sektor</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sto') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data STO</span></a>
        </li>
    <?php endif; ?>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <li class="nav-item">
        <div class="dropdown-divider"></div>
        <a class="nav-link" href="<?= site_url('logout') ?>" >
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>