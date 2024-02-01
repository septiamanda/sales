<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sektor</h1>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">List Data Sektor</h6>
                            <div class="d-sm-flex align-items-center ">
                                <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ml-auto">
                                    <i class="fas fa-plus fa-sm"></i> Tambah Data Sektor
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Sektor</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Sektor/Hero</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dataDummy = [
                                            ['Tokyo', 'Naruto', 'Hero A'],
                                            ['Shibuya', 'Sasuke', 'Hero B'],
                                            ['Nagoya', 'Shikamaru', 'Hero C'],
                                            ['Kyoto', 'Gaara', 'Hero D'],
                                            ['Fukuoka', 'Neji', 'Hero E'],
                                        ];

                                        foreach ($dataDummy as $index => $row) : ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= $row[0]; ?></td>
                                                <td><?= $row[1]; ?></td>
                                                <td><?= $row[2]; ?></td>
                                                <td>
                                                    <!-- Tambahkan action --!>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Sektor</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Sektor/Hero</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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

    <!-- Tambahkan CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- Tambahkan JS jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Tambahkan JS DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

</div>
