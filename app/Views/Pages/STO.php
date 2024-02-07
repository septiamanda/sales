<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sentral Telepon Otomat</h1>

    </div>
    <?php if (session()->getFlashdata('Pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('Pesan'); ?>
        </div>
    <?php endif; ?>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                        <a href="<?= base_url('TambahSTO'); ?>" class="d-none d-sm-inline-block btn btn-danger shadow-sm ml-auto">
                            <i class="fas fa-plus fa-sm text-#184240"></i> Sentral Telepon Otomat
                        </a>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-#184240">Data Sentral Telepon Otomat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #184240; color: white; text-align: center;">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama STO</th>
                                            <th>STO</th>
                                            <th>Hero</th>
                                            <th>Sektor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($dataSTO as $s) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $s['Nama_STO']; ?></td>
                                                <td><?= $s['STO']; ?></td>
                                                <td><?= $s['Hero']; ?></td>
                                                <td style="width: 250px;"><?= $s['Sektor']; ?></td>
                                                <td style="width: 200px;">
                                                    <a href="#" class="btn btn" style="border-color: #184240; color: #184240;">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?= $this->endSection(); ?>