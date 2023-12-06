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
        <a href="<?= base_url('/transaction-handler'); ?>" class=""> <span><i class="fas fa-bookmark"></i></span></a>
        <a href="<?= base_url('/members'); ?>" class="active2"> <span><i class="fas fa-users"></i></span></a>
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
                        <div class="dashboard_bar">Data Anggota</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a onclick="return confirm('Yakin ingin logout?')" href="<?= base_url('/admin-logout'); ?>" class="dropdown-item ai-icon">
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
                        <li><a href="<?= base_url('/transaction-handler'); ?>">Daftar Transaksi</a></li>
                        <li><a href="">Data Anggota</a></li>
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Anggota</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer</h4>
                            <a href="<?= base_url('/regist-custAdmin'); ?>"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 600px;">
                                <table id="example2" class="display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($customer as $c) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $c['nama']; ?></td>
                                                <td><?= $c['telp']; ?></td>
                                                <td><?= $c['email']; ?></td>
                                                <td><?= $c['alamat']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('/editCustPage/' . $c['id']); ?>" class="btn btn-warning" style="margin-right: 7px;">
                                                            <i class="far fa-edit "></i>
                                                        </a>
                                                        <form action="<?= base_url('/deleteCustAdmin'); ?>" method="post" class="d-inline">
                                                            <input type="hidden" value="DELETE" name="_method">
                                                            <input type="hidden" value="<?= $c['id']; ?>" name="idCustomer">
                                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus')">
                                                                <i class="far fa-trash-alt fa-lg"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
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
                            <h4 class="card-title">Admin</h4>
                            <a href="<?= base_url('/regist-admin'); ?>"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($admin as $a) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $a['username']; ?></td>
                                                <td><?= $a['email']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('/editAdmin/' . $a['id']); ?>" class="btn btn-warning" style="margin-right: 7px;">
                                                            <i class="far fa-edit "></i>
                                                        </a>
                                                        <form action="<?= base_url('/deleteAdmin'); ?>" class="d-inline" method="post">
                                                            <input type="hidden" value="DELETE" name="_method">
                                                            <input type="hidden" value="<?= $a['id']; ?>" name="idAdmin">
                                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                                                <i class="far fa-trash-alt fa-lg"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
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
                            <h4 class="card-title">Owner</h4>
                            <a href="<?= base_url('/regist-owner'); ?>"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($owner as $o) : ?>
                                            <tr>
                                                <th><?= $i++; ?></th>
                                                <td><?= $o['username']; ?></td>
                                                <td><?= $o['email']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('/editOwner/' . $o['id']); ?>" class="btn btn-warning" style="margin-right: 7px;">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <form action="<?= base_url('/delete-owner'); ?>" method="post" class="d-inline">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="idOwner" value="<?= $o['id']; ?>">
                                                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                                <i class="far fa-trash-alt fa-lg"></i>
                                                            </button>
                                                        </form>
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



<?= $this->endSection('content'); ?>