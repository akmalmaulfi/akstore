<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- PAGE TITLE HERE -->
    <title>AK Store</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?= base_url('/login-owner'); ?>"><img src="images/anjas-logo.png" alt="" width="100"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in Customer</h4>
                                    <?php if (session()->getFlashdata('error') || session()->getFlashdata('pesan')) : ?>
                                        <div class="alert <?= (session()->getFlashdata('error') ? 'alert-danger' : 'alert-success'); ?>">
                                            <span class="<?= (session()->getFlashdata('pesan')) ? 'text-white' : ''; ?>"><?= (session()->getFlashdata('pesan') ? session()->getFlashdata('pesan') : session()->getFlashdata('error')); ?></span>
                                        </div>
                                    <?php endif ?>
                                    <form action="<?= base_url('/login-cust/signin'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control  <?= ($validation->getError('email') ? 'is-invalid' : '') ?> " placeholder="hello@example.com" name="email">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control  <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" name="password" placeholder="*******">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="<?= base_url('/regist-cust'); ?>">Sign up</a></p>
                                        <p>Sign as <a class="text-primary" href="<?= base_url('/login-admin'); ?>">Admin</a></p>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>