<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/beranda'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/item-handler'); ?>" class="active2"> <span><i class="fas fa-tshirt"></i></span></a>
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
                        <div class="dashboard_bar">Master Produk</div>
                    </div>
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a href="app-profile.html" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a> -->

                                <a href="<?= base_url('/admin-logout'); ?>" class="dropdown-item ai-icon">
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
                        <li><a href="">Master Produk</a></li>
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
    <!-- row -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master Produk</a></li>
                </ol>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary solid alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg>
                            <strong>Sukses!</strong> <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kategori</h4>
                            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#modal-kategori">
                                Tambah Kategori
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 400px;">
                                <table class="table table-responsive-md table-kategori table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Kategori</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kategori as $k) : ?>
                                            <tr>
                                                <td><strong><?= $i++; ?></strong></td>
                                                <td><?= $k['nama']; ?></td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#modal-kategori" href="" class="btn btn-info tampilModalUbah" data-id="<?= $k['id']; ?>">
                                                        <i class="far fa-edit fa-lg"></i>
                                                    </a>
                                                    <a href="<?= base_url("/kategori/{$k['id']}"); ?>" class="btn btn-danger " onclick="return confirm('Yakin ingin hapus?')"><i class="far fa-trash-alt fa-lg"></i></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Produk</h4>
                            <button type="button" class="btn btn-primary tombolTambahProduk" data-bs-toggle="modal" data-bs-target="#modal-produk">
                                Tambah Produk
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 600px;">
                                <table class="table table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>FOTO</strong></th>
                                            <th><strong>PRODUK</strong></th>
                                            <th><strong>KATEGORI</strong></th>
                                            <th><strong>UKURAN</strong></th>
                                            <th><strong>STOK</strong></th>
                                            <th><strong>HARGA (Rp)</strong></th>
                                            <th><strong>DESKRIPSI</strong></th>
                                            <th><strong>AKSI</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($getProdukWithKategori as $p) : ?>
                                            <tr>
                                                <td><strong><?= $i++; ?></strong></td>
                                                <td><img width="200" height="200" src="uploads/<?= $p->foto; ?>" alt=""></td>
                                                <td><?= $p->produk; ?></td>
                                                <td><?= $p->nama; ?></td>
                                                <td> <?= $p->size; ?> </td>
                                                <td><?= $p->stok; ?></td>
                                                <td><?= $p->harga; ?></td>
                                                <td><?= $p->keterangan; ?></td>
                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#modal-produk" class="btn btn-info tombolUbahProduk" data-id="<?= $p->id; ?>">
                                                        <i class="far fa-edit fa-lg"></i>
                                                    </button>
                                                    <form action="<?= base_url('/produk/' . $p->id); ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">
                                                            <i class="far fa-trash-alt fa-lg"></i>
                                                        </button>
                                                    </form>
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


<!-- Modal  Produk -->
<!-- <div class="modal fade" id="modal-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-produk">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="produk-modal-title">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url('/produk/create'); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" id="id-produk" name="id-produk">
                        <input type="hidden" id="fotoLama" name="fotoLama">
                        <input type="hidden" id="kategoriLama" name="kategoriLama">
                        <input type="hidden" id="sizeLama" name="sizeLama">
                        <label for="exampleInputEmail1" class="form-label">Produk</label>
                        <input type="text" class="form-control" id="produk" aria-describedby="emailHelp" name="produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="default-select  form-control wide mb-3" name="kategori" id="kategori" required>
                            <option disabled selected value>-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $kt) : ?>
                                <option value="<?= $kt['id']; ?>"><?= $kt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <select class="default-select  form-control wide mb-3" name="size" required id="size">
                            <option disabled selected value>-- Pilih Size --</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" aria-describedby="emailHelp" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" aria-describedby="emailHelp" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" aria-describedby="emailHelp" name="keterangan" required>
                    </div>
                    <div class=" mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Upload Foto</span>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control" name="foto" required id="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-title">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<div class="modal fade" id="modal-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-produk">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="produk-modal-title">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url('/produk/create'); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" id="id-produk" name="id-produk">
                        <input type="hidden" id="fotoLama" name="fotoLama">
                        <input type="hidden" id="kategoriLama" name="kategoriLama">
                        <input type="hidden" id="sizeLama" name="sizeLama">
                        <label for="exampleInputEmail1" class="form-label">Produk</label>
                        <input type="text" class="form-control" id="produk" aria-describedby="emailHelp" name="produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="default-select  form-control wide mb-3" name="kategori" id="kategori" required>
                            <option disabled selected value>-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $kt) : ?>
                                <option value="<?= $kt['id']; ?>"><?= $kt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ukuran (S, M, L, XL, XXL)</label>
                        <input class="form-control" type="text" id="size" name="size">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" aria-describedby="emailHelp" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" aria-describedby="emailHelp" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" aria-describedby="emailHelp" name="keterangan" required>
                    </div>
                    <div class=" mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Upload Foto</span>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control" name="foto" required id="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-title">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kategori -->
<div class="modal fade" id="modal-kategori" tabindex="-1" aria-labelledby="modal-kategori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-kategori">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="kategori-modal-title">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul-kategori" aria-describedby="emailHelp" name="nama">
                    </div>

                </div>
                <div class="modal-footer modal-footer-kategori">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>