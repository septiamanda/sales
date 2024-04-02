<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color: black" class="h3 mb-0 text-black-800">Data Sektor</h1>
    </div>

    <?php if (session()->getFlashdata('Pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" /> </svg>
            <?= session()->getFlashdata('Pesan'); ?>
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

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Tabel Sektor</h1>
                        <a href="<?= base_url('tambahDataSektor'); ?>" class="d-none d-sm-inline-block btn btn-danger shadow-sm ml-auto mr-3">
                            <i class="fas fa-plus fa-sm text-#184240"></i> Sektor
                        </a>
                        <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusSemuaModal">
                            <i class="fas fa-trash-alt"></i> Hapus Semua Data 
                        </button> -->

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-#184240">Data Sektor</h6>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #184240; color: white; text-align: center;">
                                        <tr>
                                            <th>No.</th>
                                            <th>Datel</th>
                                            <th>Sektor</th>
                                            <th>Action</th>
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
                                                <td style="text-align:center;"><?= $no++; ?></td>
                                                <td><?= $data['nama_datel']; ?></td>
                                                <td><?= $data['nama_sektor']; ?></td>
                                                <td>
                                                    <div style="display:flex; justify-content:center; gap:10px;">
                                                        <a href="<?= base_url('editSektor/'.$data['id_sektor']); ?>" class="btn btn" style="border-color: #184240; color: #184240;">  
                                                            <i class="fas fa-edit"></i> Edit  
                                                        </a>  

                                                        <button type="button" class="btn btn-danger btn-hapus" data-id_sektor="<?= $data['id_sektor']; ?>" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no ?>">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="<?= base_url('deleteSektor/'.$data['id_sektor']); ?>">
                                                                    <input type="hidden" name="id_sektor" value="<?= $data['id_sektor']?>">
                                                                    <div class="modal-body"> 
                                                                        <h6 class="text-center">Apakah Anda yakin akan menghapus data ini? <br> 
                                                                            <span class="text-danger"><?= $data['nama_datel']?> - <?= $data['nama_sektor']?></span>
                                                                        </h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" data-id_sektor="<?= $data['id_sektor']?>" class="btn btn-primary" name="btnYa">Ya</button>
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
                                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php } 
                                        ?>
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

    <!-- Membuat Modal Hapus Semua Data -->
    <!-- <div class="modal fade" id="hapusSemuaModal" tabindex="-1" aria-labelledby="hapusSemuaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSemuaModalLabel">Konfirmasi Hapus Semua Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
                    </button>                                                         
                </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus semua data sektor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnHapusSemua">Ya</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
    </div> -->


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
        $(document).on('click', '.btn-hapus', function() {
            var id_sektor = $(this).data('id_sektor');
            $('#hapusModal' + id_sektor).modal('show');
        });

        // Tangkap klik pada tombol "Ya" di dalam modal
        $(document).on('click', '.btn-ya', function() {
            var id_sektor = $(this).data('id_sektor');
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

    // // Membuat script hapus semua data
    //     $('#btnHapusSemua').click(function() {
    //         $.ajax({
    //             type: "POST",
                // url: "",
    //             success: function(response) {
    //                 // Redirect ke halaman sektor setelah penghapusan data
    //                 window.location.href = ""
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(xhr.responseText);
    //             }
    //         });
    //     });
    


</script>
