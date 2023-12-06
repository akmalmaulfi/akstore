<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="<?= base_url('/products'); ?>" class=""> <span><i class="fas fa-home"></i></span></a>
        <a href="<?= base_url('/cart'); ?>"> <span><i class="fas fa-shopping-cart"></i></span></a>
        <a href="<?= base_url('/order-log'); ?>"> <span><i class="fas fa-clipboard"></i></span></a>
    </div>
</div>

<div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <a href="<?= base_url('/'); ?>" class="brand-logo">
            <img src="<?= base_url('images/anjas-logo.png'); ?>" alt="" width="50">
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
                        <div class="dashboard_bar">Profile</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="<?= base_url('images/avatar/1.png'); ?>" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a>

                                <a href="page-error-404.html" class="dropdown-item ai-icon">
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
                        <li><a href=" <?= base_url('/order-log'); ?>">Log Pesanan</a></li>
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
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Success!</strong> <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form action="<?= base_url('/profile/update'); ?>" method="post" class="needs-validation">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Nama
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="hidden" name="idCustomer" value="<?= $customer['id']; ?>">
                                                    <input name="nama" type="text" class="form-control <?= ($validation->getError('nama') ? 'is-invalid' : '') ?>" id="validationCustom01" placeholder="Enter a username.." required value="<?= $customer['nama']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="email" type="text" class="form-control <?= ($validation->getError('email') ? 'is-invalid' : '') ?> " id="validationCustom02" placeholder="Your valid email.." required value="<?= $customer['email']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('email'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="password" type="password" class="form-control <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" id="validationCustom03" required>
                                                    <div class=" invalid-feedback">
                                                        <?= $validation->getError('password'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom04">Alamat <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control  <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" id="validationCustom04" name="alamat" rows="5" placeholder="What would you like to see?" required><?= $customer['alamat']; ?></textarea>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('alamat'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05">No HP
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="telp" type="text" class="form-control  <?= ($validation->getError('telp') ? 'is-invalid' : '') ?>" id="validationCustom06" placeholder="08212142" required value="<?= $customer['telp']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('telp'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row mt-4">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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