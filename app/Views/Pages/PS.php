<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profesioning Service</h1>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 mb-3">
                            <h6 class="m-0 font-weight-bold text-#184240">Grafik</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-#184240">Data Profesioning Service</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #184240; color: white; text-align: center;">
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Order</th>
                                            <th>No. SC</th>
                                            <th>Nama Pengguna</th>
                                            <th>Alamat Instalasi</th>
                                            <th>Sektor/Hero</th>
                                            <th>STO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($dataPS as $ps) : ?>
                                            <tr>
                                                <th scope='row'><?= $no; ?></th>
                                                <td><?= $ps['tanggal_order']; ?></td>
                                                <td><?= $ps['noSC']; ?></td>
                                                <td><?= $ps['nama_pengguna']; ?></td>
                                                <td><?= $ps['alamat_instl']; ?></td>
                                                <td><?= $ps['sektor']; ?></td>
                                                <td><?= $ps['sto']; ?></td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
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