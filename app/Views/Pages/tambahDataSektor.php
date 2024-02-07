<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Tambah Data Sektor</h3>

                    <form action="<?= base_url('sektor'); ?>" method="post" id="formTambahDataSektor">
                        <div class="form-group">
                            <label for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="datel" id="datel">
                                <option value="" disabled selected>--Pilih Datel--</option>
                                <option value="Datel BKT">Datel BKT (Bukittinggi)</option>
                                <option value="Datel SLK">Datel SLK (Solok)</option>
                                <option value="Inner PDG">Inner PDG (Padang)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama-sektor">Nama Sektor</label>
                            <select class="form-control" name="nama_sektor" id="nama_sektor">
                                <option value="" disabled selected>--Pilih Sektor--</option>
                            </select>
                        </div>

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
                            <button type="submit" name="simpan" class="btn btn-primary btn mb-4 mr-2">Simpan</button>
                            <a href="<?= base_url('sektor'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var sektorDropdown = document.getElementById("nama_sektor");
    var heroSektorDropdown = document.getElementById("hero_sektor"); 

    document.getElementById("datel").addEventListener("change", function () {
        var selectedDatel = this.value;
        sektorDropdown.innerHTML = "";

        addOption(sektorDropdown, "--Pilih Sektor--", "");

        switch (selectedDatel) {
            case "Datel BKT":
                addOption(sektorDropdown, "Hero BKT (Bukittinggi)", "Hero BKT (Bukittinggi)");
                addOption(sektorDropdown, "PYK (Payakumbuh)","PYK (Payakumbuh)");
                addOption(sektorDropdown, "Non Hero BKT","Non Hero BKT");
                break;
            case "Datel SLK":
                addOption(sektorDropdown, "Hero SLK (Solok)","Hero SLK (Solok)");
                addOption(sektorDropdown, "Non Hero SLK", "Non Hero SLK");
                break;
            case "Inner PDG":
                addOption(sektorDropdown, "Hero BDT (Bandar Buat)", "Hero BDT (Bandar Buat)");
                addOption(sektorDropdown, "Hero KJI (Kuranji)", "Hero KJI (Kuranji)");
                addOption(sektorDropdown, "PAM (Pariaman)", "PAM (Pariaman)");
                addOption(sektorDropdown, "Non Hero PDG", "Non Hero PDG");
                break;
            default:
                break;
        }
    });

    function addOption(selectElement, optionText, optionValue) {
        var option = document.createElement("option");
        option.textContent = optionText;
        option.value = optionValue;
        selectElement.appendChild(option);
    }

    // Tambahkan event listener untuk form submit
    document.getElementById("formTambahDataSektor").addEventListener("submit", function(event) {
    // Ambil elemen input hidden untuk menyimpan teks dari dropdown nama sektor
    var namaSektorInput = document.querySelector("#nama_sektor + input[type='hidden']");
    if (!namaSektorInput) {
        // Jika belum ada input hidden, buatlah
        namaSektorInput = document.createElement("input");
        namaSektorInput.type = "hidden";
        namaSektorInput.name = "nama_sektor_display";
        this.insertBefore(namaSektorInput, this.firstChild);
    }

    // Set teks dari dropdown nama sektor ke input hidden
    namaSektorInput.value = document.getElementById("nama_sektor").options[document.getElementById("nama_sektor").selectedIndex].text;

});


</script>

<?= $this->endSection(); ?>
