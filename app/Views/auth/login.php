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
                                        <h1 class="h4  mb-4" style="font-weight: bold; color:white;">Selamat Datang Kembali</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck" style="color: white;">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="<?= site_url('dashboard') ?>" class="btn btn-primary btn-user btn-block" style="background-color: #184240; border:#184240">
                                            Login
                                        </a>
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