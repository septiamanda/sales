<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Tambah Data Sentral Telepon Otomat</h3>

                    <div class="form-group">
                        <label for="pj">Nama STO</label>
                        <input type="text" class="form-control" name="pj" id="penanggungJawab">
                    </div>

                    <div class="form-group">
                        <label for="pj">STO</label>
                        <input type="text" class="form-control" name="pj" id="penanggungJawab">
                    </div>

                    <div class="form-group">
                        <label for="pj">Hero</label>
                        <input type="text" class="form-control" name="pj" id="penanggungJawab">
                    </div>

                    <!-- <form action="#" method="post"> -->
                    <!-- <div class="form-group">
                            <label for="hero">Hero</label>
                            <select class="form-control" name="hero" id="hero">
                                <option value="" disabled selected>Pilih Hero</option>
                                <option value="STO Kekey">Kekey</option>
                                <option value="STO Bpk. Pinto">Bpk. Pinto</option>
                                <option value="STO Wiwi">Wiwi</option>
                                <option value="Non-Hero1">Non-Hero 1</option>
                                <option value="STO Sidi">Sidi</option>
                                <option value="STO Pak Elpi">Pak Elpi</option>
                                <option value="STO Khadafi">Khadapi</option>
                                <option value="Non-Hero2">Non-Hero 2</option>
                                <option value="Non-Hero3">Non-Hero 3</option>
                                <option value="Non-Hero4">Non-Hero 4</option>
                                <option value="Non-Hero5">Non-Hero 5</option>
                            </select>
                        </div> -->

                    <!-- <div class="form-group">
                            <label for="nama-STO">Nama STO</label>
                            <select class="form-control" name="nama_STO" id="nama_STO">
                                <option value="" disabled selected>Pilih STO</option> -->
                    <!-- Pilihan akan diisi melalui JavaScript -->
                    <!-- </select>
                        </div> -->

                    <form action="#" method="post">
                    <div class="form-group">
                            <label for="sektor">Sektor</label>
                            <select class="form-control" name="sektor" id="sektor">
                                <option value="" disabled selected>Pilih Sektor</option>
                                <option value="STO Kekey">Hero BKT (Bukittinggi)</option>
                                <option value="STO Bpk. Pinto">Hero PYK (Payakumbuh)</option>
                                <option value="STO Khadafi">Non Hero BKT</option>
                                <option value="STO Wiwi">Hero SLK (Solok)</option>
                                <option value="STO Khadafi">Non Hero SLK</option>
                                <option value="Non-Hero1">Hero BDT (Bandar Buat)</option>
                                <option value="STO Sidi">Hero KJI (Kuranji)</option>
                                <option value="STO Pak Elpi">Hero PAM</option>
                                <option value="STO Khadafi">Non Hero PDG</option>
                            </select>
                        </div>

                    <button type="submit" name="Simpan" class="btn btn-primary btn mb-4 mr-2">Simpan</button>
                    <a href="<?= base_url('sto'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mendapatkan elemen dropdown STO
    // var STODropdown = document.getElementById("nama_STO");

    // Menambahkan pilihan berdasarkan STO yang dipilih
    // document.getElementById("hero").addEventListener("change", function() {
    // Mendapatkan nilai STO yang dipilih
    // var selectedSTO = this.value;

    // Mengosongkan elemen dropdown STO
    // STODropdown.innerHTML = "";

    // Menambahkan pilihan berdasarkan STO yang dipilih
    // switch (selectedSTO) {
    // case "STO Kekey":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "KJI (Kuranji)", "kji");
    // addOption(STODropdown, "STB (Siteba)", "stb");
    // addOption(STODropdown, "LBY (Lubuk Buaya)", "lbyhero");
    // break;
    // case "STO Bpk. Pinto":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "BDT (....)", "bdt");
    // addOption(STODropdown, "LIM (....)", "lim");
    // addOption(STODropdown, "TLB (....)", "tlb");
    // addOption(STODropdown, "BGS (....)", "bgs");
    // addOption(STODropdown, "TPJ (....)", "tpj");
    // addOption(STODropdown, "SOB (....)", "sob");
    // break;
    // case "STO Wiwi":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "Non-Hero1":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "ULK (....)", "ulk");
    // addOption(STODropdown, "PDC (....)", "pdc");
    // break;
    // case "STO Sidi":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "BKT (....)", "bkt");
    // addOption(STODropdown, "BSO (....)", "bso");
    // addOption(STODropdown, "KMN (....)", "kmn");
    // addOption(STODropdown, "SUP (....)", "sup");
    // addOption(STODropdown, "PPJ (....)", "ppj");
    // addOption(STODropdown, "KOU (....)", "kou");
    // break;
    // case "STO Pak Elpi":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "STO Khadapi":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "Non-Hero2":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "Non-Hero3":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "Non-Hero4":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // case "Non-Hero5":
    // addOption(STODropdown, "Pilih STO", "");
    // addOption(STODropdown, "PAM (....)", "pam");
    // addOption(STODropdown, "NRS (....)", "nrs");
    // addOption(STODropdown, "SLM (....)", "slm");
    // addOption(STODropdown, "PUK (....)", "puk");
    // addOption(STODropdown, "LBA (....)", "lba");
    // addOption(STODropdown, "KYT (....)", "kyt");
    // addOption(STODropdown, "SCC (....)", "scc");
    // break;
    // default:
    // break;
    // }
    // });

    // function addOption(selectElement, text, value) {
    // Membuat elemen option
    // var option = document.createElement("option");
    // option.text = text;
    // option.value = value;

    // Menambahkan option ke dropdown
    // selectElement.add(option);
    // }
</script>

<?= $this->endSection(); ?>