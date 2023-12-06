<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- PAGE TITLE HERE -->
    <title>AK Store</title>

    <head>
        <!-- Datatable -->
        <link href="<?= base_url('vendor/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="<?= base_url('images/favicon.png') ?>" />
        <link href="<?= base_url('vendor/jquery-nice-select/css/nice-select.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('vendor/owl-carousel/owl.carousel.css') ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('vendor/nouislider/nouislider.min.css') ?>" />

        <!-- Lightbox -->
        <link rel="stylesheet" href="<?= base_url('css/lightbox.css'); ?>">

        <!-- Style css -->
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('css/style2.css') ?>" rel="stylesheet" />

        <style>
            @media print {
                @page {
                    max-width: 100%;
                    margin-top: 20px;
                }

                div.header-content,
                a.brand-logo,
                .ps,
                .nav-bottom,
                .nav-header,
                .header,
                .info-alert,
                .sidebar-nav,
                .status-bottom,
                .tombol-print,
                .footer,
                .laporan-title,
                .sidebar-report,
                .report-title,
                #debug-icon {
                    display: none !important;
                }

                .container-invoice {
                    width: 780px;
                    margin-left: -323px;
                    margin-top: -100px;
                }

                .container-report {
                    margin-top: -120px;
                    margin-left: -323px;
                    width: 780px;
                }

                .container-fluid .invoice {
                    border: 1px solid #aeaeae;
                    border-radius: 25px;
                }




            }
        </style>
    </head>

</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <?= $this->renderSection('content'); ?>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('vendor/global/global.min.js') ?>"></script>
    <script src="<?= base_url('vendor/chart.js/Chart.bundle.min.js') ?>"></script>
    <script src="<?= base_url('vendor/jquery-nice-select/js/jquery.nice-select.min.js') ?>"></script>

    <!-- Datatable -->
    <script src="<?= base_url('vendor/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/plugins-init/datatables.init.js') ?>"></script>

    <!-- Apex Chart -->
    <script src="<?= base_url('vendor/apexchart/apexchart.js') ?>"></script>

    <script src="<?= base_url('vendor/chart.js/Chart.bundle.min.js') ?>"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url('vendor/peity/jquery.peity.min.js') ?>"></script>

    <!-- Dashboard 1 -->
    <script src="<?= base_url('js/dashboard/dashboard-1.js') ?>"></script>



    <script src="<?= base_url('vendor/owl-carousel/owl.carousel.js') ?>"></script>

    <script src="<?= base_url('js/custom.min.js') ?>"></script>
    <script src="<?= base_url('js/dlabnav-init.js') ?>"></script>
    <script src="<?= base_url('js/demo.js') ?>"></script>
    <script src="<?= base_url('js/styleSwitcher.js') ?>"></script>

    <!-- LightBox -->
    <script src="<?= base_url('js/lightbox.js'); ?>"></script>

    <script src=" <?= base_url('js/script.js') ?>"></script>

    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */

            jQuery(".card-slider").owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: [
                    '<i class="fas fa-arrow-left"></i>',
                    '<i class="fas fa-arrow-right"></i>',
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    800: {
                        items: 1,
                    },
                    991: {
                        items: 1,
                    },
                    1200: {
                        items: 1,
                    },
                    1600: {
                        items: 1,
                    },
                },
            });
        }

        jQuery(window).on("load", function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>
</body>

</html>