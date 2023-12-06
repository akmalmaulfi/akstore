<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/products'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a class="active2" href="<?= base_url('/cart'); ?>"> <span><i class="fas fa-shopping-cart"></i></span></a>
        <a href="<?= base_url('/order-log'); ?>"> <span><i class="fas fa-clipboard"></i></span></a>
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
                        <div class="dashboard_bar">Cart</div>
                    </div>
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?= base_url('/profile/' . $customerData['id']); ?>" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile</span>
                                </a>

                                <a href="<?= base_url('/cust-logout'); ?>" class="dropdown-item ai-icon" onclick="return confirm('apakah kamu yakin')">
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
                        <li><a href="">Keranjang</a></li>
                        <li><a href="<?= base_url('/order-log'); ?>">Log Pesanan</a></li>
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

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 order-lg-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Keranjang</span>

                                        <span class="badge badge-primary badge-pill"><?= count($cart); ?></span>
                                    </h4>
                                    <?php

                                    use Config\Format;

                                    if ($cart == []) : ?>
                                        <p class="alert alert-primary">keranjang kamu kosong nih.</p>
                                    <?php elseif ($cart != []) : ?>
                                        <ul class="list-group mb-3">
                                            <?php foreach ($cart as $p) : ?>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div style="width: 60%;">
                                                        <h6 class="my-0"> <?= $p['nama']; ?></h6>
                                                        <small class="text-muted">x<?= $p['qty']; ?></small>
                                                    </div>
                                                    <div style="width: 40%;">
                                                        <h6 class=" my-0"><?= $p['size']; ?></h6>
                                                        <small class="text-muted"><?= formatRupiah($p['harga'] * $p['qty']); ?>
                                                        </small>
                                                    </div>
                                                    <a href="<?= base_url('/removeProduct/' . $p['id']); ?>" class="trash"><i class="fas fa-trash"></i></a>
                                                </li>
                                            <?php endforeach ?>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total</span>
                                                <strong>
                                                    <?= formatRupiah($totalHarga); ?>
                                                </strong>
                                            </li>
                                        </ul>

                                        <div class="clear-cart">
                                            <a href="<?= base_url('/clear-cart'); ?>" class="mr-0" onclick="return confirm('Yakin ingin hapus?')">Hapus Semua</a>
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="col-lg-8 order-lg-1">
                                    <h4 class="mb-3">Detail Checkout</h4>
                                    <form method="post" action="<?= base_url('/checkout'); ?>" class="needs-validation">
                                        <?= csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label"></label>
                                                <input type="hidden" name="customerId" value="<?= $customerData['id']; ?>">
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="" value="<?= $customerData['nama']; ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Telepon</label>
                                                <input type="text" name="telp" class="form-control" id="telp" placeholder="" value="<?= $customerData['telp']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                            <input value="<?= $customerData['email']; ?>" type="email" name="email" class="form-control" id="email" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="address" readonly value="<?= $customerData['alamat']; ?>">
                                        </div>

                                        <hr class="mb-4">

                                        <button class="btn btn-primary btn-lg btn-block" type="submit" <?= empty($cart) ? 'disabled' : ''; ?>> Checkout</button>
                                    </form>
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