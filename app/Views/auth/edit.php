<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg" style="background-color: #DE5858;">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4" style="color:white; font-weight: bold;">Edit Account</h1>
                                </div>

                                <?php
                                $currentURI = service('uri')->getPath();

                                if (strpos($currentURI, 'editA') !== false) {
                                    $formAction = base_url('updateA');
                                    $defaultData = $adminData;
                                } else {
                                    $formAction = base_url('updateK');
                                    $defaultData = $karyawanData;
                                }
                                ?>

                                <form action="<?= $formAction; ?>" method="POST" class="user">
                                    <input type="hidden" name="kode" value="<?= $defaultData['userId']; ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address" value="<?= $defaultData['userEmail']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username" value="<?= $defaultData['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="role" value="Admin" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #184240; border:#184240">
                                        Save
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
<?= $this->endSection(); ?>