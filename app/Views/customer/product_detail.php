<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!--**********************************
        Main wrapper start
    ***********************************-->
<div class="nav-bottom">
    <div>
        <a href=""> <span>Home</span></a>
        <a href=""> <span>Profile</span></a>
        <a href=""> <span>Log Pesanan</span></a>
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
                        <div class="dashboard_bar">Details</div>
                    </div>
                    <ul class="navbar-nav header-right">


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="<?= base_url('images/avatar/1.png'); ?>" width="56" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="app-profile.html" class="dropdown-item ai-icon">
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
                        <li><a href="<?= base_url('/cart'); ?>">Keranjang <span>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="first">
                                            <img class="img-fluid" src="<?= base_url('uploads/' . $produk['foto']); ?>" alt="" width="545" height="621">
                                        </div>
                                    </div>

                                </div>
                                <!--Tab slider End-->
                                <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                    <div class="product-detail-content">
                                        <!--Product details-->
                                        <div class="new-arrival-content pr">
                                            <h4><?= $produk['produk']; ?></h4>
                                            <!-- <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                   z <li><i class="fa fa-star"></i></li>

                                                </ul>
                                            </div> -->
                                            <div class="d-table mb-2">
                                                <p class="price float-start d-block"><?= formatRupiah($produk['harga']); ?></p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i class="fa fa-shopping-basket"></i></span>
                                            </p>
                                            <p class="badge badge-primary text-white"><?= $produk['size']; ?></p>

                                            <p class="text-content"><?= $produk['keterangan']; ?></p>
                                            <div class="d-flex align-items-end flex-wrap mt-4">

                                                <div class="shopping-cart  mb-2 me-3">
                                                    <a class="btn btn-primary" href="<?= base_url('/addCart/' . $produk['id']) ?>"><i class="fa fa-shopping-basket me-2"></i>Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- review -->
                <div class="modal fade" id="reviewModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="text-center mb-4">
                                        <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                                    </div>
                                    <div class="mb-3">
                                        <div class="rating-widget mb-4 text-center">
                                            <!-- Rating Stars Box -->
                                            <div class="rating-stars">
                                                <ul id="stars">
                                                    <li class="star" title="Poor" data-value="1">
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="Fair" data-value="2">
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="Good" data-value="3">
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="Excellent" data-value="4">
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="WOW!!!" data-value="5">
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                    </div>
                                    <button class="btn btn-success btn-block">RATE</button>
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