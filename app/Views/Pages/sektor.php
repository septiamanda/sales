
<?php

//Koneksi Database
$server = "localhost";
$user = "root";
$password = "";
$database = "salesyak";

//Buat Koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

?>


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
                        </div>

                        <!-- Form pencarian -->
                        <div class="card-body">
                        <form action="<?= base_url('sektor'); ?>" method="post">
                            <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="cari" placeholder="Cari..." aria-label="Cari.." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="cari_sektor">Cari</button>
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
                                    <thead>
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
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM sektor ORDER BY id_sektor ASC");
                                        while ($data = mysqli_fetch_array($tampil)) :
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['datel']; ?></td>
                                            <td><?php echo $data['nama_sektor']; ?></td>
                                            <td><?php echo $data['hero_sektor']; ?></td>
                                            <td>
                                                <a href="<?= base_url('editSektor/'. $data['id_sektor']); ?>" class="btn btn-primary">Edit</a>
                                                <!-- <a href="<?= base_url('editSektor?id='. $data['id_sektor']); ?>" class="btn btn-primary">Edit</a> -->
                                                <a href="<?= base_url('deleteSektor/'. $data['id_sektor']); ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
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

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            var input = document.querySelector('input[name="cari"]').value.toLowerCase().trim();
            var rows = document.querySelectorAll('#sektorTable tbody tr');
        
        rows.forEach(function(row) {
            var datel = row.cells[1].textContent.toLowerCase();
            var namaSektor = row.cells[2].textContent.toLowerCase();
            var heroSektor = row.cells[3].textContent.toLowerCase();
            
            if (datel.includes(input) || namaSektor.includes(input) || heroSektor.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }

        $(document).ready(function () {
            $('#koneksi').DataTable();
        });
    </script>
