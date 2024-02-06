<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sales</h1>
    </div>

    <hr>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">'
                    <div class="card shadow mb-4">
                        <div class=" card-header py-3 d-sm-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Cari Data Sales</h6>
                        </div>

                        <div class="card-body">
                            <div class="row mb-2 ">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <div class="col-6 col-sm-4">
                                                    <h6> Pilih Tanggal </h6>
                                                </div>
                                                <div class="w-100 d-none d-md-block"></div>

                                                <div class="col-6 col-sm-4">
                                                    <select class="form-select" aria-label="Disabled select example" disabled>
                                                        <option selected>Pilih Tanggal</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="col">
                                                <div class="col-6 col-sm-4">
                                                    <h6> Pilih Tanggal </h6>
                                                </div>
                                                <div class="w-100 d-none d-md-block"></div>

                                                <div class="col-6 col-sm-4">
                                                    <select class="form-select" aria-label="Disabled select example" disabled>
                                                        <option selected>Pilih Tanggal</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="col">
                                                <div class="col-6 col-sm-4">
                                                    <h6> Pilih Tanggal </h6>
                                                </div>
                                                <div class="w-100 d-none d-md-block"></div>

                                                <div class="col-6 col-sm-4">
                                                    <select class="form-select" aria-label="Disabled select example" disabled>
                                                        <option selected>Pilih Tanggal</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <hr>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">List Data Sektor</h6>
                    </div>

                    <!-- form pencarian -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-start align-items-center">
                                <form class="form-inline my-2">
                                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                                </form>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center ">
                                <a href="<?= base_url('tambahDataSektor'); ?>" class="btn btn-primary shadow-sm ml-auto">
                                    <i class="fas fa-plus fa-sm"></i> Tambah Data Sektor
                                </a>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Datel (Daerah Telkom) </th>
                                        <th>Kode Sektor</th>
                                        <th>Nama Sektor</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataDummy = [
                                        ['Datel BKT', 'HERO BKT', 'Hero Bukittinggi', 'Uzumaki Naruto'],
                                        ['Datel BKT', 'PYK', 'Payakumbuh', 'Uchiha Sasuke'],
                                        ['Datel SLK', 'HERO SLK', 'Hero Solok', 'Nara Shikamaru'],
                                        ['Datel SLK', 'NON HERO', 'NON HERO', 'Hyuga Neji'],
                                    ];

                                    foreach ($dataDummy as $index => $row) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $row[0]; ?></td>
                                            <td><?= $row[1]; ?></td>
                                            <td><?= $row[2]; ?></td>
                                            <td><?= $row[3]; ?></td>
                                            <td>
                                                <!-- Tambahkan action -->
                                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- Fitur paginasi -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div>
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
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