<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Edit Data Sektor</h3>

                    <form action="<?= base_url('updateDataSektor'); ?>" method="post" id="formEditDataSektor">
                        <!-- Field Datel -->
                        <div class="form-group">
                            <label for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="datel" id="datel">
                                <option value="" disabled selected>--Pilih Datel--</option>
                                <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                <option value="Datel SLK">Datel SLK (Solok)</option>
                                <option value="Inner PDG">Inner PDG (Padang)</option>
                            </select>
                        </div>

                        <!-- Field Nama Sektor -->
                        <div class="form-group">
                            <label for="nama-sektor">Nama Sektor</label>
                            <select class="form-control" name="nama_sektor" id="nama_sektor">
                                <!-- Option akan diisi melalui JavaScript -->
                            </select>
                        </div>

                        <!-- Field Hero Sektor -->
                        <div class="form-group">
                            <label for="hero_sektor">Hero Sektor</label>
                            <select class="form-control" name="hero_sektor" id="hero_sektor">
                                <option value="" disabled selected>--Pilih Hero Sektor--</option>
                                <option value="Kekey">Kekey</option>
                                <option value="Bpk. Pinto">Bpk. Pinto</option>
                                <option value="Wiwi">Wiwi</option>
                                <option value="Sidi">Sidi</option>
                                <option value="Pak Elpi">Pak Elpi</option>
                                <option value="Khadafi">Khadafi</option>
                                <option value="Non-Hero">Non-Hero</option>
                            </select>
                        </div>

                        <div class="input-group mb-3 d-flex justify-content-center">
                            <button type="submit" name="update" class="btn btn-primary btn mb-4 mr-2">Update</button>
                            <a href="<?= base_url('sektor'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function untuk mengisi dropdown dengan data dari server
    function populateDropdownsWithData() {
        // Lakukan pengisian dropdown dengan data dari server
        // Bagian ini biasanya melibatkan permintaan AJAX untuk mendapatkan data saat ini
    }

    // Panggil fungsi untuk mengisi dropdown saat halaman dimuat
    window.onload = populateDropdownsWithData;

    // Event listener untuk pengiriman formulir
    document.getElementById("formEditDataSektor").addEventListener("submit", function(event) {
        // Lakukan validasi di sisi klien di sini
        // Jika validasi berhasil, izinkan formulir untuk dikirim
        // Jika tidak, cegah formulir dari pengiriman dan tampilkan error
    });
</script>

<?= $this->endSection(); ?>
