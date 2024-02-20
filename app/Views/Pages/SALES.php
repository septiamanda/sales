

<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

<!--kalau sukses-->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>

            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

<!--kalau eror-->

<?php if (session()->has('errors')) : ?>

    <div class="alert alert-danger" role="alert">
        <?php foreach (session('errors') as $error) : ?>
            <svg class="bi flex-shrink-2 me-2 " width="16" height="16" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <?= esc($error) ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


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
                <div class="container-fluid">
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
                    <h6 class="m-0 font-weight-bold text-primary">List Data Sales</h6>
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
                            <button class="btn btn-primary shadow-sm ml-auto" data-bs-toggle="modal" data-bs-target="#tambahSales">
                                <i class="fas fa-plus fa-sm"></i> Tambah Data Sales
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahSales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <form action="<?= base_url('simpanSales') ?>" method="post">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header center">
                                            <h3>Tambah Sales</h3>
                                        </div>
                                        <div class="modal-body">

                                            <div class="mb-3 row">
                                                <label for="inputNoSC" class="col-sm-3 col-form-label">Nomor SC</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="inputNomorSC">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="namaPel" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="namaPel">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="alamatInt" class="col-sm-3 col-form-label">Alamat Instalasi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="alamatInt">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="tanggal_sales" class="col-sm-3 col-form-label">Tanggal Order</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tanggal_sales">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="sektorsales" class="col-sm-3 col-form-label">Sektor</label>
                                                <div class="col-sm-9">

                                                    <select class="form-control" name="sektorsales">
                                                        <option value="" disabled selected>Pilih Sektor</option>
                                                        <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                                        <option value="Datel SLK">Datel SLK (Solok)</option>
                                                        <option value="Inner PDG">Inner PDG (Padang)</option>
                                                    </select>

                                                </div>


                                            </div>
                                            <div class="mb-3 row">
                                                <label for="sektorsales" class="col-sm-3 col-form-label">STO</label>
                                                <div class="col-sm-9">

                                                    <select class="form-control" name="stosales">
                                                        <option value="" disabled selected>Pilih STO</option>
                                                        <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                                        <option value="Datel SLK">Datel SLK (Solok)</option>
                                                        <option value="Inner PDG">Inner PDG (Padang)</option>
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="sektorsales" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">

                                                    <select class="form-control" name="status">
                                                        <option value="" disabled selected>Pilih Status</option>
                                                        <option value="RE">RE</option>
                                                        <option value="FCC">FCC</option>
                                                        <option value="PI">PI</option>
                                                        <option value="PS">PS</option>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="tombolSimpanSales" name="Simpan" class="btn btn-primary btn">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Order </th>
                                    <th>Nomor SC </th>
                                    <th>Nama Pengguna</th>
                                    <th>Alamat Instalasi</th>
                                    <th>Sektor</th>
                                    <th>STO</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($salesData as $sd) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $sd['tanggal_order']; ?></td>
                                        <td><?= $sd['noSC']; ?></td>
                                        <td><?= $sd['nama_pengguna']; ?></td>
                                        <td><?= $sd['alamat_instl']; ?></td>
                                        <td><?= $sd['sektor']; ?></td>
                                        <td><?= $sd['sto']; ?></td>
                                        <td><?= $sd['status']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
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

<!-- Tambahkan JS jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?= $this->endSection(); ?>


<!-- Tambahkan CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
</link>

<!-- Tambahkan JS DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

</div>