<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- PAGE TITLE HERE -->
    <title>Admin Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image" href="anjas-logo.png">
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
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="<?= base_url('/regist-cust/create'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Nama</strong></label>
                                            <input type="text" class="form-control <?= ($validation->getError('nama') ? 'is-invalid' : '') ?>" placeholder="Nama Anda" name="nama">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control  <?= ($validation->getError('email') ? 'is-invalid' : '') ?> " placeholder="hello@example.com" name="email">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control  <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" name="password" placeholder="********">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Alamat</strong></label>
                                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control  <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" placeholder="Jln. Random"></textarea>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('alamat'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>No. HP</strong></label>
                                            <input type="number" class="form-control <?= ($validation->getError('telp') ? 'is-invalid' : '') ?>" name="telp" placeholder="Masukkan 62 sebelum nomor anda">
                                            <div id="validationServer03Feedback" class="invalid-feedback <?= ($validation->getError('password') ? 'is-invalid' : '') ?> ">
                                                <?= $validation->getError('telp'); ?>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="<?= base_url('/login-cust'); ?>">Sign in</a></p>
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