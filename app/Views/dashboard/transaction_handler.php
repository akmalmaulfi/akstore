<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/beranda'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/item-handler'); ?>" class=""> <span><i class="fas fa-tshirt"></i></span></a>
        <a href="<?= base_url('/order-handler'); ?>" class=""> <span><i class="fas fa-clipboard"></i></span></a>
        <a href="<?= base_url('/transaction-handler'); ?>" class="active2"> <span><i class="fas fa-bookmark"></i></span></a>
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
                        <div class="dashboard_bar">Data Transaksi</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a href="<?= base_url('/admin-logout'); ?>" onclick="return confirm('Yakin logout?')" class="dropdown-item ai-icon">
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
                        <li><a href="<?= base_url('/beranda'); ?>">Beranda</a></li>
                        <li><a href="<?= base_url('/item-handler'); ?>">Master Produk</a></li>
                        <li><a href="<?= base_url('/order-handler'); ?>">Data Pesanan</a></li>
                        <li><a href="">Daftar Transaksi</a></li>
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
    <!-- row -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Transaksi</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pesanan Terkirim</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Customer</th>
                                            <th>Telp</th>
                                            <th>Total</th>
                                            <th>Status Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        foreach ($data as $d) : ?>

                                            <?php if ($d['pembayaran']['status'] == 'Pesanan telah diterima') : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= date('d/m/Y', strtotime($d['pembayaran']['created_at'])); ?></td>
                                                    <td><?= $d['customer']['nama']; ?></td>
                                                    <td><?= $d['customer']['telp']; ?></td>
                                                    <td><?= formatRupiah($d['subTotalWithPPN']); ?></td>
                                                    <td>
                                                        <span class="badge badge-success"> <?= $d['pembayaran']['status']; ?></span> <br>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Customer</th>
                                            <th>Telp</th>
                                            <th>Total</th>
                                            <th>Status Barang</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pesanan Dalam Proses & Pengiriman</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Customer</th>
                                            <th>Telp</th>
                                            <th>Total</th>
                                            <th>Status Barang</th>
                                            <th>Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data as $d) : ?>
                                            <?php if ($d['pembayaran']['status'] == 'Pesanan sedang di proses' || $d['pembayaran']['status'] == 'Pesanan sudah dikirim') : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= date('d/m/Y', strtotime($d['pembayaran']['created_at'])); ?></td>
                                                    <td><?= $d['customer']['nama']; ?></td>
                                                    <td><?= $d['customer']['telp']; ?></td>
                                                    <td><?= formatRupiah($d['subTotalWithPPN']); ?></td>
                                                    <td>
                                                        <?php if ($d['pembayaran']['status'] == 'Pesanan sedang di proses') : ?>
                                                            <span class="badge badge-warning"><?= $d['pembayaran']['status']; ?></span> <br>
                                                        <?php else :  ?>
                                                            <span class="badge badge-info"><?= $d['pembayaran']['status']; ?></span> <br>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($d['pembayaran']['status'] == 'Pesanan sedang di proses') : ?>
                                                            <form action="<?= base_url('/order-shipped'); ?>" class="d-inine" method="post">
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input type="hidden" name="idPembayaran" value="<?= $d['pembayaran']['id']; ?>">
                                                                <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Ubah status barang?')">Pesanan sudah dikirim</button>
                                                            </form>
                                                        <?php elseif ($d['pembayaran']['status'] == 'Pesanan sudah dikirim') : ?>
                                                            <form action="<?= base_url('/order-arrived'); ?>" class="d-inine" method="post">
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input type="hidden" name="idPembayaran" value="<?= $d['pembayaran']['id']; ?>">
                                                                <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Ubah status barang?')">Pesanan Sampai</button>
                                                            </form>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Customer</th>
                                            <th>Telp</th>
                                            <th>Total</th>
                                            <th>Status Barang</th>
                                            <th>Konfirmasi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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