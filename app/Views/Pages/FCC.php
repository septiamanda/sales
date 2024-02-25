<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Verifikasi</h1>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 mb-3" style="background-color: #DE5858;">
                            <h6 class="m-0 font-weight-bold text-white">Grafik Data Verifikasi</h6>
                            <div class="col-sm-3 mt-3">
                                <input type="number" value="<?= date('Y') ?>" id="tahunFCC" class="form-control" onchange="getDataSales()">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="FCCAreaChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-berhasil">Data FCC</h6>
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
                                            <th>Sektor</th>
                                            <th>STO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($dataFCC as $fcc) : ?>
                                            <tr>
                                                <th scope='row'><?= $no; ?></th>
                                                <td><?= $fcc['tanggal_order']; ?></td>
                                                <td><?= $fcc['noSC']; ?></td>
                                                <td><?= $fcc['nama_pengguna']; ?></td>
                                                <td><?= $fcc['alamat_instl']; ?></td>
                                                <td><?= $fcc['sektor']; ?></td>
                                                <td><?= $fcc['sto']; ?></td>
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

    <!-- Load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Load Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


    <?= $this->endSection(); ?>