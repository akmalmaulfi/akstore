<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- PAGE TITLE HERE -->
    <title>Edit Owner</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image" href="anjas-logo.png">
    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">

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
                                    <h4 class="text-center mb-4">Edit Owner</h4>
                                    <form action="<?= base_url('/updateOwner'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="hidden" name="idOwner" value="<?= $owner['id']; ?>">
                                            <input type="text" class="form-control <?= ($validation->getError('username') ? 'is-invalid' : '') ?>" placeholder="nama kamu" name="username" value="<?= $owner['username']; ?>" readonly>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control  <?= ($validation->getError('email') ? 'is-invalid' : '') ?> " placeholder="hello@example.com" name="email" value="<?= $owner['email']; ?>">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control  <?= ($validation->getError('password') ? 'is-invalid' : '') ?>" name="password">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
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

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('js/custom.min.js'); ?>"></script>
    <script src="<?= base_url('js/dlabnav-init.js'); ?>"></script>
    <script src="<?= base_url('js/styleSwitcher.js'); ?>"></script>
</body>

</html>