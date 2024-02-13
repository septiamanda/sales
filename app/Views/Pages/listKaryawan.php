<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Karyawan</h1>
    </div>

    <?php if (session()->getFlashdata('Pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('Pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="<?= site_url('tambahK') ?>" class="d-none d-sm-inline-block btn btn-danger shadow-sm ml-auto">
            <i class="fas fa-plus fa-sm text-white-50"></i> Karyawan
        </a>
    </div>

    <hr>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-#184240">Data Akun Karyawan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #184240; color: white; text-align: center;">
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($karyawanData as $kar) : ?>
                                            <tr>
                                                <th scope='row'><?= $no; ?></th>
                                                <td><?= $kar['username']; ?></td>
                                                <td><?= $kar['userEmail']; ?></td>
                                                <td class="text-center">
                                                    <!-- Tambahkan action -->
                                                    <a href="<?= base_url('editK' . $kar['userId']); ?>" class="btn btn" style="border-color: #184240; color: #184240;">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="<?= base_url('deleteKaryawan' . $kar['userId']); ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="_method" id="DELETE">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?= $this->endSection(); ?>