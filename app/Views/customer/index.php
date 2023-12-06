<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href="" class="active2"> <span><i class="fas fa-home"></i></span></a>
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
                        <div class="dashboard_bar">Our Products</div>
                    </div>
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="images/avatar/1.png" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?= base_url('/profile/' . $customer['id']); ?>" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a>

                                <a href="<?= base_url('/cust-logout'); ?>" class="dropdown-item ai-icon" onclick="return confirm('yakin logout?')">
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
                        <li><a href="<?= base_url('/cart'); ?>">Keranjang <span>
                                    <?php
                                    if ($cart) : ?>
                                        <span class="badge badge-primary"><?= count(session()->get('cart', [])); ?></span>
                                    <?php endif ?>
                                </span></a></li>
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
        <?php if (session()->get('recommendProduk')) : ?>
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active text-dark text-primary">Recommendation</li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <?php foreach (session()->get('recommendProduk') as $p) : ?>
                        <div class="col-xl-3 col-lg-6 col-sm-6 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrivals-img-contnent">
                                            <img width="545" height="621" class="img-fluid" src="uploads/<?= $p['foto']; ?>" alt="">
                                        </div>
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4><a href="<?= base_url('/detail/' . $p['id']); ?>"><?= $p['produk']; ?></a></h4>
                                            <!-- <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul> -->
                                            <span class="price"> <?= formatRupiah($p['harga']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        <?php endif ?>

        <div class="container-fluid mt-2">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-dark text-uppercase text-primary">Our Latest Product</li>
                </ol>
            </div>
            <div class="row d-flex justify-content-end my-3">
                <div class="col-lg-3 col-sm-6">
                    <form action="<?= base_url('/search'); ?>" method="get">
                        <div class="input-group mb-3">
                            <select class=" default-select form-control wide" name="kategori" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Button</button>
                        </div>
                    </form>
                </div>
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
                <?php if ($produk == []) : ?>
                    <div class="row" style="height: 300px;">
                        <div class="col">
                            <div class="alert alert-info notification">
                                <p class="notificaiton-title mb-2">
                                    <strong>Produk tidak ditemukan.</strong>
                                </p>
                                <p>Maaf, produk dengan kategori yang kamu cari saat ini belum tersedia, pantau terus yaa 😁 </p>

                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <?php foreach ($produk as $p) : ?>
                        <div class="col-xl-3 col-lg-6 col-sm-6 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrivals-img-contnent">
                                            <img width="545" height="621" class="img-fluid" src="uploads/<?= $p['foto']; ?>" alt="">
                                        </div>
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4><a href="<?= base_url('/detail/' . $p['id']); ?>"><?= $p['produk']; ?></a></h4>
                                            <span class="price"> <?= formatRupiah($p['harga']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
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