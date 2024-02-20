<?php include 'koneksi.php'; ?>

<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color: black" class="h3 mb-0 text-black-800">Data Sektor</h1>
    </div>


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
                        </div>

                        <!-- Form pencarian dan Tambah Data Sektor -->
                        <div class="card-body">
                            <form action="<?= base_url('sektor/cari'); ?>" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control col-8" name="cari" placeholder="Masukkan kata kunci..." aria-label="Cari.." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="cari">Cari</button>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                                        <a href="<?= base_url('tambahDataSektor'); ?>" class="btn btn-primary shadow-sm ml-auto">
                                            <i class="fas fa-plus fa-sm"></i> + Tambah Data Sektor
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="sektorTable" width="100%" cellspacing="0">
                                    <thead style="text-align:center; color:black;" >
                                        <tr>
                                            <th>No.</th>
                                            <th>Datel (Daerah Telkom)</th>
                                            <th>Nama Sektor</th>
                                            <th>HERO Sektor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Persiapan menampilkan data
                                        $no = 1;
                                        if (!empty($sektor)) {
                                            foreach ($sektor as $data) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nama_datel']; ?></td>
                                                <td><?= $data['nama_sektor']; ?></td>
                                                <td><?= $data['hero_sektor']; ?></td>
                                                <td>
                                                     <a href="<?= base_url('editSektor/'.$data['id_sektor']); ?>" class="btn btn-primary"> 
                                                        <i class="fas fa-edit"></i> Edit </a> 

                                                    <button type="button" class="btn btn-danger btn-hapus"  data-id="<?= $data['id_sektor']; ?>" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no ?>"> Hapus</button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
                                                                </div>

                                                                <form method="post" action="<?= base_url('deleteSektor/'.$data['id_sektor']); ?>">
                                                                    <input type="hidden" name="id_sektor" value="<?= $data['id_sektor']?>">
                                                                    <div class="modal-body"> 
                                                                        <h6 class="text-center">Apakah Anda yakin akan menghapus data ini? <br> 
                                                                            <span class="text-danger"><?= $data['nama_datel']?> - <?= $data['nama_sektor']?> - <?= $data['hero_sektor']?></span>
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary" name="btnYa">Ya</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; 
                                        } else { ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        <?php } 
                                        ?>
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

    <!-- Bootsrap Ikon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Tambahkan CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- Tambahkan JS jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Tambahkan JS DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xNjISw2W5T/uJT9abC1rQBu5Ez2XmVL1d31VX6r1TcCDYI7IB8nKzhIQ+rJZyJ6H" crossorigin="anonymous"></script>

    <!-- Skrip JavaScript untuk menangani penghapusan -->
    <script>
        $(document).ready(function() {
        // Tangkap klik pada tombol hapus
        $('.btn-hapus').click(function() {
            var id_sektor = $(this).data('id_sektor');
            $('#hapusModal' + id_sektor).modal('show');
            $('#btnYa').click(function() {
                // Menghapus data menggunakan AJAX
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('deleteSektor'); ?>/" + id_sektor,
                    success: function(response) {
                        // Redirect ke halaman sektor setelah penghapusan data
                        window.location.href = "<?= base_url('sektor'); ?>"
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    });

    </script>