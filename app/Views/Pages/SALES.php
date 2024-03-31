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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800" id="judul-sales">Data Sales</h1>
    </div>

    <!--kalau sukses-->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert" id="alert">
            <svg class="bi flex-shrink-0 me-2" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>

            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!--kalau takjadi-->
    <?php if (session()->has('gagal')) : ?>
        <div class="alert alert-warning" role="alert">
            <svg class="bi flex-shrink-2 me-2 " width="16" height="16" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>

            <?= session()->getFlashdata('gagal'); ?>
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
    <hr>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4" id="container-sales">
                        <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-gray-800">Cari Data Sales</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php base_url('SalesController/listSales') ?>" method="get">
                                <label for="date">Tanggal:</label>
                                <div class="form-group">
                                    <input type="date" id="date" name="tanggal_order" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" style="height: 40px; margin-left: 10px ; margin-right: 10px">Cari</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <hr>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-gray-800">List Data Sales</h6>
                </div>

                <!-- form pencarian -->
                <div class="card-body">
                    <div class="row mb-3" style="margin-left: 0px" id="cari-sales">
                        <form action="<?= base_url('search') ?>" method="post" class="form-inline my-2">
                            <input class="form-control" type="text" placeholder="Search..." aria-label="Search" name="carisales">
                        </form>

                        <!-- Tampilkan hasil pencarian jika sudah ada hasil -->
                        <?php if (isset($sales) && !empty($sales)) : ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>NoSC</th>
                                        <th>Nama Pengguna</th>
                                        <th>Alamat Instalasi</th>
                                        <th>Sektor</th>
                                        <th>STO</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sales as $sale) : ?>
                                        <tr>
                                            <td><?= $sale['noSC'] ?></td>
                                            <td><?= $sale['nama_pengguna'] ?></td>
                                            <td><?= $sale['alamat_instl'] ?></td>
                                            <td><?= $sale['sektor'] ?></td>
                                            <td><?= $sale['sto'] ?></td>
                                            <td><?= $sale['status'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php elseif (isset($sales) && empty($sales)) : ?>
                            <p>No data found</p>
                        <?php endif; ?>

                        <div class="col-md-6 d-flex justify-content-end align-items-center" style="margin-left: 320px">
                            <button class="btn btn-danger shadow-sm ml-2" data-bs-toggle="modal" data-bs-target="#tambahSales">
                                <i class="fas fa-plus fa-sm"></i> Tambah Data Sales
                            </button>
                            <button class="btn btn-success ml-3" onclick="window.print()"><i class="bi bi-printer"></i> Cetak</button>
                        </div>
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


                    <!-- Modal tambah sales-->
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
                                                    <?php if (!empty($sektors)) : ?>
                                                        <?php foreach ($sektors as $sektor) : ?>
                                                            <option value="<?= esc($sektor['nama_sektor']) ?>"><?= esc($sektor['nama_sektor']) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </select>
                                            </div>


                                        </div>
                                        <div class="mb-3 row">
                                            <label for="stosales" class="col-sm-3 col-form-label">STO</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="stosales">
                                                    <option value="" disabled selected>Pilih STO</option>
                                                    <?php if (!empty($stos)) : ?>
                                                        <?php foreach ($stos as $sto) : ?>
                                                            <option value="<?= $sto['STO'] ?>"><?= $sto['STO'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
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

                    <!-- Modal edit sales-->
                    <div class="modal fade" id="editSales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="<?= base_url('editSales') ?>" method="post">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header center">
                                        <h3>Ubah Data Sales</h3>
                                    </div>
                                    <div class="modal-body">

                                        <input type="hidden" name="id_sales" id="id_sales">

                                        <div class="mb-3 row">
                                            <label for="inputNoSC" class="col-sm-3 col-form-label">Nomor SC</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="inputNomorSC" id="nomorSC">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="namaPel" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="namaPel" id="namaPel">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamatInt" class="col-sm-3 col-form-label">Alamat Instalasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="alamatInt" id="alamatInt">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="tanggal_sales" class="col-sm-3 col-form-label">Tanggal Order</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" name="tanggal_sales" id="tanggal_sales">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="sektorsales" class="col-sm-3 col-form-label">Sektor</label>
                                            <div class="col-sm-9">

                                                <select class="form-control" name="sektorsales" id="sektorsales">
                                                    <option value=""></option>
                                                    <option value="" disabled selected> Pilih Sektor</option>
                                                    <option value="Hero BKT">Hero BKT</option>
                                                    <option value="Hero Non-BKT">Non-Hero BKT</option>
                                                    <option value="Hero PYK">Hero PYK</option>
                                                    <option value="Hero SLK">Hero SLK</option>
                                                    <option value="Hero Non-SLK">Non-Hero SLK</option>
                                                    <option value="Hero BDT">Hero BDT</option>
                                                    <option value="Hero KJI">Hero KJI</option>
                                                    <option value="Hero PAM">Hero PAM</option>
                                                    <option value="Hero Non-PDG">Non Hero PDG</option>
                                                </select>

                                            </div>


                                        </div>
                                        <div class="mb-3 row">
                                            <label for="sektorsales" class="col-sm-3 col-form-label">STO</label>
                                            <div class="col-sm-9">

                                                <select class="form-control" name="stosales" id="stosales">
                                                    <option value="" disabled selected></option>
                                                    <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                                    <option value="Datel SLK">Datel SLK (Solok)</option>
                                                    <option value="Inner PDG">Inner PDG (Padang)</option>
                                                </select>


                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 row">
                                            <label for="sektorsales" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">

                                                <select class="form-control" name="status" id="status" disabled aria-label="Disabled select example" disabled>
                                                    <option value="" disabled selected> </option>
                                                    <option value="RE">RE</option>
                                                    <option value="FCC">FCC</option>
                                                    <option value="PI">PI</option>
                                                    <option value="PS">PS</option>
                                                </select>


                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" id="tombolUbahSales" name="Ubah" class="btn btn-primary btn">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal delete sales-->
                    <div class="modal fade" id="deleteSales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <h5 class="font-weight-bold" style="text-align: center;"> Apakah Anda ingin menghapus data ini? </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="<?= isset($sd['id_sales']) ? base_url('deleteSales/' . $sd['id_sales']) : '#' ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" id="DELETE">
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UPDATE -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #184240; color: white; text-align: center;">
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Order </th>
                                    <th>Tanggal Update </th>
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
                                <?php foreach ($salesData as $key => $sd) : ?>
                                    <tr>
                                        <td style="width: 30px; text-align: center;"><?= $key + 1; ?></td>
                                        <td><?= $sd['tanggal_order']; ?></td>
                                        <td><?= $sd['tanggal_update']; ?></td>
                                        <td><?= $sd['noSC']; ?></td>
                                        <td><?= $sd['nama_pengguna']; ?></td>
                                        <td><?= $sd['alamat_instl']; ?></td>
                                        <td><?= $sd['sektor']; ?></td>
                                        <td><?= $sd['sto']; ?></td>
                                        <td><?= $sd['status']; ?></td>
                                        <td style="width: 210px;">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSales" id="btn-edit" data-id="<?= $sd['id_sales']; ?>" data-tanggal="<?= $sd['tanggal_order']; ?>" data-nosc="<?= $sd['noSC']; ?>" data-nama="<?= $sd['nama_pengguna']; ?>" data-alamat="<?= $sd['alamat_instl']; ?>" data-sektor="<?= $sd['sektor']; ?>" data-sto="<?= $sd['sto']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSales" id="btn-delete"><i class="fas fa-trash-alt"></i></button>
                                            <!-- Formulir update status -->
                                            <form action="<?= base_url('updateStatus/' . $sd['id_sales']); ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" id="DELETE">

                                                <!-- Tombol untuk memunculkan modal dropdown -->
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#statusModal<?= $sd['id_sales']; ?>">Update</button>

                                                <!-- Modal dropdown status -->
                                                <div class="modal fade" id="statusModal<?= $sd['id_sales']; ?>" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="statusModalLabel">Pilih Status Baru</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <select name="status" class="form-control">
                                                                    <option value="RE" <?= $sd['status'] == 'RE' ? 'selected' : ''; ?>>RE</option>
                                                                    <option value="FCC" <?= $sd['status'] == 'FCC' ? 'selected' : ''; ?>>FCC</option>
                                                                    <option value="PI" <?= $sd['status'] == 'PI' ? 'selected' : ''; ?>>PI</option>
                                                                    <option value="PS" <?= $sd['status'] == 'PS' ? 'selected' : ''; ?>>PS</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END UPDATE -->

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

        <script>
            $(document).ready(function() {
                // Mengambil data STO saat modal ditampilkan
                $('#tambahSales').on('shown.bs.modal', function() {
                    $.ajax({
                        url: '<?= base_url('getSTO') ?>', // Sesuaikan dengan URL method getSTO di controller Anda
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var stoDropdown = $('#stosales');
                            stoDropdown.empty();
                            stoDropdown.append($('<option>').val('').text('Pilih STO'));
                            $.each(data, function(index, sto) {
                                stoDropdown.append($('<option>').val(sto.id).text(sto.nama_sto)); // Sesuaikan dengan struktur data STO Anda
                            });
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).on('click', '#btn-edit', function() {
                var id = $(this).data('id'); // Mengambil ID sales dari tombol
                $('.modal-body #id_sales').val(id);
                $('.modal-body #id_sales').val($(this).data('id'));
                $('.modal-body #tanggal_sales').val($(this).data('tanggal'));
                $('.modal-body #nomorSC').val($(this).data('nosc'));
                $('.modal-body #namaPel').val($(this).data('nama'));
                $('.modal-body #alamatInt').val($(this).data('alamat'));
                $('.modal-body #sektorsales').val($(this).data('sektor'));
                $('.modal-body #stosales').val($(this).data('sto'));

            })

            $(document).on('click', '#btn-delete', function() {
                var id = $(this).data('id'); // Mengambil ID sales dari tombol
            })
        </script>

        <?= $this->endSection(); ?>


        <!-- Tambahkan CSS DataTables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        </link>

        <!-- Tambahkan JS DataTables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <!-- UPDATE -->
        <script>
            $(document).ready(function() {
                // Saat halaman dimuat, cek status setiap data penjualan
                $('.btn-update').each(function() {
                    var id_sales = $(this).data('id');

                    // Kirim permintaan AJAX untuk memeriksa status
                    $.ajax({
                        url: "checkStatus/" + id_sales,
                        method: "post",
                        success: function(response) {
                            // Jika status adalah PS, nonaktifkan tombol update
                            if (response.status == 'PS') {
                                $('#btn-update-' + id_sales).prop('disabled', true);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>


        <!-- UPDATE -->
        <script>
            $(document).ready(function() {
                // Tampilkan modal dropdown saat tombol "Update" di klik
                $('.btn-outline-danger').click(function() {
                    $($(this).data('target')).modal('show');
                });
            });
        </script>

    </div>