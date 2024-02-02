<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Tambah Data Sektor</h3>

                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="datel" id="datel">
                                <option value="" disabled selected>Pilih Datel</option>
                                <option value="Datel BKT">Datel BKT</option>
                                <option value="Datel SLK">Datel SLK</option>
                                <option value="Inner PDG">Inner PDG</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama-sektor">Nama Sektor</label>
                            <select class="form-control" name="nama_sektor" id="nama_sektor">
                                <option value="" disabled selected>Pilih Sektor</option>
                                <!-- Pilihan akan diisi melalui JavaScript -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pj">Penanggung Jawab</label>
                            <input type="text" class="form-control" name="pj" id="penanggungJawab">
                        </div>

                        <button type="submit" name="Simpan" class="btn btn-primary btn mb-4 mr-2">Simpan</button>
                        <a href="<?= base_url('sektor'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mendapatkan elemen dropdown sektor
    var sektorDropdown = document.getElementById("nama_sektor");

    // Menambahkan pilihan berdasarkan datel yang dipilih
    document.getElementById("datel").addEventListener("change", function () {
        // Mendapatkan nilai datel yang dipilih
        var selectedDatel = this.value;

        // Mengosongkan elemen dropdown sektor
        sektorDropdown.innerHTML = "";

        // Menambahkan pilihan berdasarkan datel yang dipilih
        switch (selectedDatel) {
            case "Datel BKT":
                addOption(sektorDropdown, "Pilih Sektor", "");
                addOption(sektorDropdown, "Hero BKT", "hero_bkt");
                addOption(sektorDropdown, "PYK", "pyk");
                addOption(sektorDropdown, "Non Hero", "non_hero");
                break;
            case "Datel SLK":
                addOption(sektorDropdown, "Pilih Sektor", "");
                addOption(sektorDropdown, "Hero SLK", "hero_slk");
                addOption(sektorDropdown, "Non Hero", "non_hero_slk");
                break;
            case "Inner PDG":
                addOption(sektorDropdown, "Pilih Sektor", "");
                addOption(sektorDropdown, "Hero BDT", "hero_bdt");
                addOption(sektorDropdown, "HERO KJI", "hero_kji");
                addOption(sektorDropdown, "PAM", "pam");
                addOption(sektorDropdown, "Non Hero", "non_hero_pdg");
                break;
            default:
                break;
        }
    });

    function addOption(selectElement, text, value) {
        // Membuat elemen option
        var option = document.createElement("option");
        option.text = text;
        option.value = value;

        // Menambahkan option ke dropdown
        selectElement.add(option);
    }
</script>

<?= $this->endSection(); ?>
