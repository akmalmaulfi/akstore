<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/products'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/cart'); ?>"> <span><i class="fas fa-shopping-cart"></i></span></a>
        <a class="active2" href="<?= base_url('/order-log'); ?>"> <span><i class="fas fa-clipboard"></i></span></a>
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
                        <div class="dashboard_bar">Log Pesanan</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" ß width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?= base_url('/profile/' . $customerData['id']); ?>" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/200d0/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a>

                                <a onclick="return confirm('Yakin logout?')" href="<?= base_url('/cust-logout'); ?>" class="dropdown-item ai-icon">
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
                    <a class="has-arrow sidebar2" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('/products'); ?>">Home</a></li>
                        <li><a href="<?= base_url('/cart'); ?>">Keranjang</a></li>
                        <li><a href="">Log Pesanan</a></li>
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
    <div class=" content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <?php if (empty($data)) : ?>
                                <div class="alert alert-primary alert-dismissible fade show">
                                    <strong>Ups!</strong> Kamu masih belum memiliki riwayat belanja nih.
                                </div>
                            <?php else : ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm vertical-align-center">
                                        <thead>
                                            <tr>
                                                <th style="vertical-align: middle;" class="text-center">#</th>
                                                <th>Tanggal</th>
                                                <th>Produk</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($data as $d) : ?>
                                                <tr>
                                                    <th class=" text-center" style="vertical-align: middle;"><?= $i++; ?></th>
                                                    <td><?= date('d/m/Y', strtotime($d['pembayaran']['created_at'])); ?></td>
                                                    <td>
                                                        <?php foreach ($d['produkInfo'] as $produk) : ?>
                                                            <strong><?= $produk['produk']; ?></strong> : <?= formatRupiah($produk['harga']); ?> <br>
                                                        <?php endforeach ?>
                                                        <br>
                                                        <strong>PPN 10%</strong> : <?= formatRupiah($d['ppn']); ?><br>
                                                        <strong>TOTAL</strong>: <?= formatRupiah($d['subTotalWithPPN']); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('/invoice/' . $d['pembayaran']['id']); ?>" class="btn btn-success">Lihat Invoice</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
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