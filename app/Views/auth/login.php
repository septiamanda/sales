<?php

use App\Controllers\loginUser;
?>
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
                                        <h1 class="h4  mb-4" style="font-weight: bold; color:white;">Login</h1>
                                    </div>
                                    <?= form_open('login/cekUser', ['class' => 'user']); ?>
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <?php
                                        $isInvalidUser = (session()->getFlashdata('errEmail')) ? 'is-invalid' : '';
                                        ?>
                                        <input type="email" class="form-control form-control-user <?= $isInvalidUser ?>" name="email" aria-describedby="emailHelp" placeholder="Enter your email..." autofocus>
                                        <?php
                                        if (session()->getFlashdata('errEmail')) {
                                            echo '<div id= "validationServer03Feedback" class="invalid-feedback">
                                            ' . session()->getFlashdata('errEmail') . '
                                            </div>';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                    <?php
                                        $isInvalidUser = (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                                        ?>
                                        <input type="password" class="form-control form-control-user <?= $isInvalidUser ?>" name="password" placeholder="Password">
                                        <?php
                                        if (session()->getFlashdata('errPassword')) {
                                            echo '<div id= "validationServer03Feedback" class="invalid-feedback">
                                            ' . session()->getFlashdata('errPassword') . '
                                            </div>';
                                        }
                                        ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #184240; border:#184240">
                                        Login
                                    </button>
                                    <hr>
                                    <?= form_close(); ?>
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