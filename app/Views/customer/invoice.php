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
                        <div class="dashboard_bar">Invoice</div>
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
    <div class="dlabnav sidebar-nav">
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
        <div class="container-fluid container-invoice">
            <div class="row info-alert">
                <div class="col-12">
                    <div class="alert alert-warning solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        <strong>Warning!</strong> Harga diluar ongkos kirim & Produk yang sudah dibayar tidak dapat dikembalikan
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="card mt-1 invoice">
                        <div class="card-header"> Invoice <strong><?= date('d/m/Y', strtotime($pembayaran['created_at'])); ?></strong> <span class="float-end">
                                <strong>Status:</strong> <span class="badge badge-<?= ($pembayaran['status'] == 'Dibatalkan Pembeli' ? 'danger' : 'primary'); ?>"><?= $pembayaran['status']; ?></span> </span> </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <h6>Pemesan:</h6>
                                    <div> <strong><?= $customer['nama']; ?></strong> </div>
                                    <div>Email: <?= $customer['email']; ?></div>
                                    <div>Phone: <?= $customer['telp']; ?></div>
                                </div>
                                <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <h6>Kepada:</h6>
                                    <div> <strong>Anjas</strong> </div>
                                    <div>Bank: BCA (Bank Central Asia)</div>
                                    <div>Rek: 21412214</div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Produk</th>
                                            <th class="right">Size</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($produkInfo as $p) : ?>
                                            <tr>
                                                <td class="center"><?= $i++; ?></td>
                                                <td class="left strong"><?= $p['produk']; ?></td>
                                                <td class="left"><?= $p['size']; ?></td>
                                                <td class="right"><?= $p['jumlah'] ?></td>
                                                <td class="center"><?= formatRupiah($p['jumlah'] * $p['harga']) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 mt-3 status-bottom">
                                    <?php if ($pembayaran['status'] == 'Menunggu Konfirmasi Admin') : ?>
                                        <div class="alert alert-primary notification">
                                            <p class="notificaiton-title mb-2">
                                                <strong>Terima kasih atas pembayaran Anda.</strong>
                                            </p>
                                            <p>Mohon menunggu konfirmasi dari admin kami untuk memproses pesanan Anda.</p>
                                        </div>
                                    <?php elseif ($pembayaran['status'] == 'Dibatalkan Pembeli') : ?>
                                        <div class="alert alert-danger notification">
                                            <p class="notificaiton-title mb-2">
                                                <strong>Pesanan telah dibatalkan oleh Pembeli</strong>
                                            </p>
                                            <p>Terima kasih telah berbelanja di AK Store.</p>

                                        </div>
                                    <?php elseif ($pembayaran['status'] == 'Pesanan sedang di proses') : ?>
                                        <div class="alert alert-primary notification">
                                            <p class="notificaiton-title mb-2">
                                                <strong>Bukti valid, pesanan anda akan segera kami proses.</strong>
                                            </p>
                                            <p>Admin kami akan segera menginfokan mengenai biaya ongkos kirim ke WhatsApp kamu, pastikan WA kamu aktif yaa.</p>

                                        </div>
                                    <?php elseif ($pembayaran['status'] == 'Pesanan sudah dikirim') : ?>
                                        <div class="alert alert-primary notification">
                                            <p class="notificaiton-title mb-2">
                                                <strong>Pesanan anda sudah dikirim.</strong>
                                            </p>
                                            <p>Terima kasih telah berbelanja di AK Store, mohon menunggu kedatangan barang.</p>

                                        </div>
                                    <?php elseif ($pembayaran['status'] == 'Pesanan telah diterima') : ?>
                                        <div class="alert alert-primary notification">
                                            <p class="notificaiton-title mb-2">
                                                <strong>Pesanan sudah sampai tujuan.</strong>
                                            </p>
                                            <p>Terima kasih telah berbelanja di AK Store.</p>

                                        </div>
                                    <?php else : ?>
                                        <strong>Upload Bukti Pembayaran:</strong>
                                        <form action="<?= base_url('/paymentProof'); ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class=" mt-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Upload Foto</span>
                                                    <div class="form-file">
                                                        <input name="idPembayaran" type="hidden" value="<?= $pembayaran['id']; ?>">
                                                        <input type="file" class="form-file-input form-control" name="buktiPembayaran" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-5 mb-4">
                                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                                            </div>
                                        </form>
                                    <?php endif ?>
                                </div>
                                <div class="col-lg-4 col-sm-5 ms-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>Subtotal</strong></td>
                                                <td class="right"><?= formatRupiah($subTotal); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>PPN (10%)</strong></td>
                                                <td class="right"><?= formatRupiah($ppn); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Total</strong></td>
                                                <td class="right"><strong><?= formatRupiah($subTotalWithPPN); ?></strong><br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="print-invoice mt-3">
                                        <?php if ($pembayaran['status'] == 'Menunggu Pembayaran') : ?>
                                            <form action="<?= base_url('/cancelOrder'); ?>" method="post">
                                                <input type="hidden" value="<?= $pembayaran['id']; ?>" name="idPembayaran">

                                                <button type="submit" class="btn btn-danger cancel" onclick="return confirm('Yakin batalkan pesanan ini?')">Batalkan Pemesanan</button>
                                            </form>
                                        <?php endif ?>
                                        <button onclick="window.print()" class="btn btn-primary tombol-print"><i class="fas fa-print"></i> Cetak</button>
                                        <!-- <a href="" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a> -->
                                        <?php if ($pembayaran['status'] == 'Pesanan sudah dikirim') : ?>
                                            <form action="<?= base_url('/order-arrived-cust'); ?>" method="post" class="d-inline" id="orderArrivedForm">
                                                <input type="hidden" name="idPembayaran" value="<?= $pembayaran['id']; ?>">
                                                <input type="hidden" name="idProduk" id="idProduk" value="<?= implode(',', $idProdukArray); ?>">
                                                <input type="hidden" name="idCustomer" value="<?= $customer['id']; ?>">
                                                <button type="button" class="btn btn-success" onclick="showRatingPopup()">Barang sudah sampai</button>
                                                <button type="submit" id="submitButton" style="display:none;"></button>
                                            </form>

                                        <?php endif ?>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" id="modalRate" data-bs-target="#modalRating" style="display: none;"></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalRating">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Rating</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <fieldset class="rating">
                                                            <input type="radio" id="star5" name="ratingStars" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                            <input type="radio" id="star4half" name="ratingStars" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                            <input type="radio" id="star4" name="ratingStars" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                            <input type="radio" id="star3half" name="ratingStars" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                            <input type="radio" id="star3" name="ratingStars" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                            <input type="radio" id="star2half" name="ratingStars" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                            <input type="radio" id="star2" name="ratingStars" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                            <input type="radio" id="star1half" name="ratingStars" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                            <input type="radio" id="star1" name="ratingStars" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                            <input type="radio" id="starhalf" name="ratingStars" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" onclick="submitRating()">Kirim Rating</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" id="btnRecommend" data-bs-target="#modalRecommend" style="display: none;">wdwdwd</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalRecommend">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Recommendation for you!</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="width: 100%;" class="d-flex gap-3  align-item-center justify-content-center flex-wrap">

                                                        <?php foreach ($recommend as $p) : ?>
                                                            <div class="card shadow p-2" style="max-width: 15rem;">
                                                                <img src="<?= base_url('uploads/' .  $p['foto']); ?>" class="card-img-top" alt="...">
                                                                <h6 class="mt-3 text-muted text-center"><?= $p['produk']; ?></h6>
                                                                <a href="<?= base_url('/detail/' . $p['id']); ?>" class="btn btn-sm btn-primary mt-2">Lihat</a>
                                                            </div>
                                                        <?php endforeach ?>
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

<?= $this->endSection('content'); ?>