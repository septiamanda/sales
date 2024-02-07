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
                            <div class="row ml-4">
                                <div class="col-4">
                                    <div class="col">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="w-100 "></div>

                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">

                                    <div class="col">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="w-100 "></div>

                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-4">

                                    <div class="col">
                                        <h6> Pilih Tanggal </h6>
                                    </div>
                                    <div class="w-100 "></div>

                                    <div class="col">
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
                            <form class="form-inline my-2">
                                <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
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
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>Tambah Data Sektor</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pj">Nomor SC</label>
                                            <input type="text" class="form-control" name="nomorSC" id="nomorSC">
                                        </div>

                                        <div class="form-group">
                                            <label for="pj">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan">
                                        </div>

                                        <div class="form-group">
                                            <label for="pj">Alamat Instalasi</label>
                                            <input type="text" class="form-control" name="alamatInstalasi" id="alamatInstalasi">
                                        </div>
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="datel">Datel (Daerah Telkom)</label>
                                                <select class="form-control" name="datel" id="datel">
                                                    <option value="" disabled selected>Pilih Datel</option>
                                                    <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                                    <option value="Datel SLK">Datel SLK (Solok)</option>
                                                    <option value="Inner PDG">Inner PDG (Padang)</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama-sektor">Sektor</label>
                                                <select class="form-control" name="nama_sektor" id="namaSektor">
                                                    <option value="" disabled selected>Pilih Sektor</option>
                                                    <!-- Pilihan akan diisi melalui JavaScript -->
                                                </select>
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