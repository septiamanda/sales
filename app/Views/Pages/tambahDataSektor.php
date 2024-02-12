

<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container" style="max-width: 800px;>
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Tambah Data Sektor</h3>

                    <form action="<?= base_url('sektor'); ?>" method="post" id="formTambahDataSektor">
                        <div class="form-group">
                            <label for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="id_datel" id="datel">
                                <option value="" disabled selected>--Pilih Datel--</option>

                                <?php
                                include "koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM datel") or die(mysqli_error($koneksi));
                                while($data = mysqli_fetch_array($query)){
                                    echo "<option value='".$data['id_datel']."'>".$data['nama_datel']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama-sektor">Nama Sektor</label>
                            <input type="text" class="form-control" name="nama_sektor" id="nama_sektor">
                        </div>

                        <div class="form-group">
                            <label for="hero_sektor">Hero Sektor</label>
                            <input type="text" class="form-control" name="hero_sektor" id="hero_sektor">
                        </div>

                        <div class="input-group mb-3 d-flex justify-content-center">
                            <button id="btn-simpan" type="submit" value="Simpan" name="simpan" class="btn btn-primary btn mb-4 mr-2">Simpan</button>
                            <a href="<?= base_url('sektor'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
    // Tangkap klik pada tombol simpan
    $('#btn-simpan').click(function(event) {
        // Mencegah perilaku standar dari tombol submit di dalam form
        event.preventDefault();

        // Mengambil data form
        var form = $('#formTambahDataSektor')[0];
        var formData = new FormData(form);

        // Mengirim data form menggunakan AJAX
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('simpanDataSektor'); ?>",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                // Menampilkan alert "Data Berhasil Ditambahkan" di halaman sektor
                $('#alert-simpan').addClass('show');
                setTimeout(function() {
                    $("#alert-simpan").removeClass('show');
                }, 3000);

                // Redirect ke halaman sektor setelah 3 detik
                setTimeout(function() {
                    window.location.href = "<?= base_url('sektor'); ?>";
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


</script>

<?= $this->endSection(); ?>
