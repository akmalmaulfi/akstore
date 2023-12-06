<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/owner-produk'); ?>" class="active2"> <span><i class="fas fa-tshirt"></i></span></a>
        <a href="" class=""> <span><i class="fas fa-book-open"></i></span></a>
    </div>
</div>


<div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <a href="<?= base_url('/'); ?>" class="brand-logo">
            <img src="images/anjas-logo.png" alt="" width="50">
            <div class="brand-title">
                <h2 class="">AK Store</h2>
            </div>
        </a>

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
                        <div class="dashboard_bar">Report</div>
                    </div>
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a href="<?= base_url('/owner-logout'); ?>" class="dropdown-item ai-icon" onclick="return confirm('yakin logout?')">
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
    <div class="dlabnav sidebar-report">
        <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a class="has-arrow sidebar2" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('/owner-produk'); ?>">Produk</a></li>
                        <li><a href="">Laporan</a></li>
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
    <!-- row -->
    <div class="content-body">
        <div class="container-fluid container-report">
            <div class="row page-titles report-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card laporan-title">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Pesanan Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <!-- <div class="col-md-6 col-xl-3 col-xxl-6 mb-3"> -->
                            <form action="<?= base_url('/laporan-owner'); ?>" method="post" style="width: 100%;">
                                <label class="form-label">Pilih Bulan</label>
                                <div class="input-group">
                                    <input type="month" class="form-control" id="single-input" name="periode" placeholder="Now" required>
                                    <button type="submit" class="btn waves-effect waves-light btn-ft btn-dark">Hasil</button>
                                </div>
                            </form>

                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- Card -->
                </div>

                <?php if (isset($data)) : ?>
                    <?php if ($data != null) : ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Laporan Penjualan per <?= $tanggalReqLaporan; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-report">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th><strong>#</strong></th>
                                                    <th><strong>Tanggal</strong></th>
                                                    <th><strong>Member</strong></th>
                                                    <th><strong>Barang</strong></th>
                                                    <th><strong>Total Harga Pesanan</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($data as $d) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= date('d/m/Y', strtotime($d['pembayaran']['created_at'])); ?></td>
                                                        <td><?= $d['customer']['nama']; ?></td>
                                                        <td>
                                                            <ul>
                                                                <?php foreach ($d['produkInfo'] as $p) : ?>
                                                                    <li>
                                                                        <strong><?= $p['produk']; ?></strong>: <?= formatRupiah($p['harga']); ?> <br>
                                                                    </li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                            <strong>PPN 10%</strong>: <?= formatRupiah($d['ppn']); ?>
                                                        </td>
                                                        <td class="color-primary"><?= formatRupiah($d['subTotalWithPPN']); ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <div style="width: 100%; position: relative;" class="text-right bg-danger mt-4">
                                            <button style="position: absolute; right: 10px;" onclick="window.print()" class="btn btn-primary tombol-print"><i class="fas fa-print"></i> Cetak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span class="alert alert-danger" style="width: 100%;">Laporan pada periode tersebut tidak tersedia</span>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>


                <?php endif ?>

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