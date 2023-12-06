<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/beranda'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/item-handler'); ?>" class=""> <span><i class="fas fa-tshirt"></i></span></a>
        <a href="<?= base_url('/order-handler'); ?>" class="active2"> <span><i class="fas fa-clipboard"></i></span></a>
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
                        <div class="dashboard_bar">Data Pesanan</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a onclick="return confirm('Yakin logout?')" href="<?= base_url('/admin-logout'); ?>" class="dropdown-item ai-icon">
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
                        <li><a href="">Data Pesanan</a></li>
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
    <!-- row -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Pesanan</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pemesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md table-kategori table-hover">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Tanggal</strong></th>
                                            <th><strong>Pesanan</strong></th>
                                            <th></th>
                                            <th><strong>Status</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $angka = 1; ?>
                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td><strong><?= $angka++; ?></strong></td>
                                                <td><?= date('d/m/Y', strtotime($d['pembayaran']['created_at'])); ?></td>
                                                <td style="max-width: 150px;">
                                                    <span> <b>Nama: </b><?= $d['customer']['nama']; ?></span><br>
                                                    <span> <b>Telp: </b><?= $d['customer']['telp']; ?></span><br>
                                                    <span> <b>Alamat: </b><?= $d['customer']['alamat']; ?></span>
                                                </td>
                                                <td>
                                                    <span> <b>Produk: </b> </span><br>
                                                    <ul>

                                                        <?php
                                                        $i = 1;
                                                        foreach ($d['produkInfo'] as $p) : ?>
                                                            <li><?= $i++; ?>. <?= $p['produk']; ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                    <br>
                                                    <span> <b>PPN 10%: </b><?= formatRupiah($d['ppn']); ?></span><br>
                                                    <span> <b>Total: </b><?= formatRupiah($d['subTotalWithPPN']); ?></span><br><br>

                                                </td>
                                                <td>
                                                    <div>
                                                        <?php if ($d['pembayaran']['bukti'] !== null && $d['pembayaran']['status'] == 'Menunggu Konfirmasi Admin') : ?>
                                                            <a href="<?= base_url('/uploads/bukti_pembayaran/' . $d['pembayaran']['bukti']); ?>" class="btn btn-primary btn-sm  <?= ($d['pembayaran']['bukti'] === null ? 'disabled' : ''); ?>" data-lightbox="image-1" data-title="<?= $d['pembayaran']['bukti']; ?>">Lihat Bukti Pembayaran</a>

                                                            <a href="https://wa.me/<?= $d['customer']['telp']; ?>" class="btn btn-success btn-sm rounded-xl" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a>

                                                            <form class="d-inline" action="<?= base_url('/cancel-order'); ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input type="hidden" name="bukti" value="<?= $d['pembayaran']['bukti']; ?>">
                                                                <input type="hidden" name="idPembayaran" value="<?= $d['pembayaran']['id']; ?>">
                                                                <button class="btn btn-danger btn-sm <?= ($d['pembayaran']['bukti'] === null ? 'disabled' : ''); ?>" onclick="return confirm('Yakin bukti tidak valid?')">Bukti Tidak Valid</button>
                                                            </form>


                                                            <form action="<?= base_url('/confirm-order') ?>" method="post" class="d-inline">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input type="hidden" name="idPembayaran" value="<?= $d['pembayaran']['id']; ?>">
                                                                <button type="submit" class="btn btn-info btn-sm <?= ($d['pembayaran']['bukti'] === null ? 'disabled' : ''); ?>" onclick="return confirm('Yakin konfirmasi pesanan ini?')">Konfirmasi</button>
                                                            </form>

                                                        <?php elseif ($d['pembayaran']['status'] == 'Pesanan sedang di proses') : ?>
                                                            <span class="badge badge-success badge-lg">Bukti valid, pesanan sedang di proses</span>
                                                            <a href="https://wa.me/<?= $d['customer']['telp']; ?>" class="btn btn-success btn-sm rounded-xl" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a>
                                                        <?php elseif ($d['pembayaran']['status'] == 'Pesanan sudah dikirim') : ?>
                                                            <span class="badge badge-success badge-lg">Pesanan sudah dikirim</span>
                                                            <a href="https://wa.me/<?= $d['customer']['telp']; ?>" class="btn btn-success btn-sm rounded-xl" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a>

                                                        <?php elseif ($d['pembayaran']['status'] == 'Pesanan telah diterima') : ?>
                                                            <span class="badge badge-success badge-lg">Selesai</span>
                                                            <a href="https://wa.me/<?= $d['customer']['telp']; ?>" class="btn btn-success btn-sm rounded-xl" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a>
                                                        <?php elseif ($d['pembayaran']['status'] == 'Dibatalkan Pembeli') : ?>
                                                            <span class="badge badge-danger badge-lg">Pesanan dibatalkan pembeli</span>

                                                        <?php else : ?>
                                                            <span class="badge badge-warning badge-lg">Customer belum melakukan upload bukti</span>
                                                            <a href="https://wa.me/<?= $d['customer']['telp']; ?>" class="btn btn-success btn-sm rounded-xl" target="_blank"><i class="fab fa-whatsapp fa-lg"></i></a>
                                                        <?php endif ?>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
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


<!-- Modal Produk -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stok</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class=" mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Upload Foto</span>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kategori -->
<div class="modal fade" id="modal-kategori" tabindex="-1" aria-labelledby="modal-kategori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>