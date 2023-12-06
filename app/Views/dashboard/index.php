<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/beranda'); ?>" class="active2"> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/item-handler'); ?>" class=""> <span><i class="fas fa-tshirt"></i></span></a>
        <a href="<?= base_url('/order-handler'); ?>"> <span><i class="fas fa-clipboard"></i></span></a>
        <a href="<?= base_url('/transaction-handler'); ?>"> <span><i class="fas fa-bookmark"></i></span></a>
        <a href="<?= base_url('/members'); ?>"> <span><i class="fas fa-users"></i></span></a>
        <a href="<?= base_url('/report'); ?>"> <span><i class="fas fa-book-open"></i></span></a>
    </div>
</div>

<div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <a href="<?= base_url('/beranda'); ?>" class="brand-logo">
            <img src="images/anjas-logo.png" alt="" width="50">
            <!-- <svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
                <defs></defs>
            </svg> -->
            <div class="brand-title">
                <h2 class="">AK Store</h2>
            </div>
        </a>
        <!-- <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div> -->
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header border-bottom">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left ">
                        <div class="dashboard_bar">Dashboard</div>
                    </div>
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a href="<?= base_url('/profile'); ?>" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a> -->

                                <a href="<?= base_url('/admin-logout'); ?>" class="dropdown-item ai-icon" onclick="return confirm('Yakin logout?')">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ms-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="dlabnav">
        <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="">Beranda</a></li>
                        <li><a href="<?= base_url('/item-handler'); ?>">Master Produk</a></li>
                        <li><a href="<?= base_url('/order-handler'); ?>">Data Pesanan</a></li>
                        <li><a href="<?= base_url('/transaction-handler'); ?>">Daftar Transaksi</a></li>
                        <li><a href="<?= base_url('/members'); ?>">Data Anggota</a></li>
                        <li><a href="<?= base_url('/report-handler'); ?>">Laporan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card tryal-gradient">
                                        <div class="card-body tryal row">
                                            <div class="col-xl-7 col-sm-6">
                                                <h2>Welcome Admin</h2>
                                                <span>Selamat datang di halaman Dashboad Admin, silahkan kelola data sesuai kebutuhan.
                                                </span>
                                            </div>
                                            <div class="col-xl-5 col-sm-6">
                                                <img src="images/chart.png" alt="" class="sd-shape" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">
                                                            Total Barang
                                                        </h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0"><?= $produk; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6 ">
                                            <div class="card">
                                                <div class="card-body d-flex p-4 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">
                                                            Total Customers
                                                        </h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0"><?= $customer; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6 ">
                                            <div class="card">
                                                <div class="card-body d-flex p-4 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">
                                                            Total Pesanan
                                                        </h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0"><?= $pesanan; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6 ">
                                            <div class="card">
                                                <div class="card-body d-flex p-4 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">
                                                            Total Transaksi
                                                        </h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0"><?= $pembayaran; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>
            Copyright © Akmal Maulfi</a> 2023
        </p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->



<?= $this->endSection('content'); ?>