<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

<body class="myBackground">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="p-5">
                    <h1 class="text-center" style="color:black; font-weight: bold;">Dashboard Sales</h1>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6" style="display: flex; justify-content: center; align-items: center;">
                                <img src="/img/logofull.png" alt="Logo yee" width="250">
                            </div>
                            <div class="col-lg-6" style="background-color: #DE5858;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4  mb-4" style="font-weight: bold; color:white;"><?= lang('Auth.loginTitle') ?></h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('login') ?>" method="post" class="user">
                                        <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                                        </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                    <label class="custom-control-label" for="customCheck" style="color: white;"><?= lang('Auth.rememberMe') ?></label>
                                                </div>
                                            </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #184240; border:#184240">
                                            <?= lang('Auth.loginAction') ?>
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>