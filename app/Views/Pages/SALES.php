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
                            <div class="row ml-5 md-3">
                                <div class="col-4">
                                    <div class="row">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="row">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="row">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-4">

                                    <div class="row">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="row">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
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
                            <form action="" method="get" class="form-inline my-2">
                                <input class="form-control" type="text" placeholder="Search..." aria-label="Search" name="carisales">
                            </form>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center ">
                            <button class="btn btn-primary shadow-sm ml-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fas fa-plus fa-sm"></i> Tambah Data Sektor
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header center">
                                        <h3>Tambah Sales</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3 row">
                                            <label for="inputNoSC" class="col-sm-3 col-form-label">Nomor SC</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputNomorSC">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="namaPel" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="namaPel">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamatInt" class="col-sm-3 col-form-label">Alamat Instalasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="alamatInt">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="sektorsales" class="col-sm-3 col-form-label">Sektor</label>
                                            <div class="col-sm-9">
                                                <form action="#" method="post">
                                                    <select class="form-control" name="sektorsales" id="sektorsales">
                                                        <option value="" disabled selected>Pilih Sektor</option>
                                                        <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                                        <option value="Datel SLK">Datel SLK (Solok)</option>
                                                        <option value="Inner PDG">Inner PDG (Padang)</option>
                                                    </select>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="Simpan" class="btn btn-primary btn">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor SC </th>
                                    <th>Nama Pengguna</th>
                                    <th>Alamat Instalasi</th>
                                    <th>Sektor</th>
                                    <th>STO</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                

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