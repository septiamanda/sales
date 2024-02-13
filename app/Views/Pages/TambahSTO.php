<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<style>
    .card-header {
        background-color: #184240;
        border-color: #184240;
        color: white;
        text-align: center;
    }

    .form-control {
        border-color: #184240;
    }

    body {
        background-color: #184240;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card text-center" style="background-color: #184240; border-color: #184240;">
                <div class="card-header">
                    <h3 class="h3 mb-4 mt-5" style="color:white; font-weight: bold;">Tambah Data Sentral Telepon Otomat</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('save'); ?>" method="post">

                        <div class="row g-3">
                            <div class="col-md-8">
                                <input type="text" class="form-control form-control-lg" placeholder="Nama STO" name="NamaSTO" id="ns" style="border-radius: 50px; font-size: 1rem;">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control form-control-lg" placeholder="STO" name="STO" id="sto" style="border-radius: 50px; font-size: 1rem;">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <input type="text" class="form-control form-control-lg" placeholder="Hero" name="Hero" id="hero" style="border-radius: 50px; font-size: 1rem;">
                        </div>

                        <div class="form-group mt-4">
                            <select class="form-control form-control-lg" name="Sektor" id="sektor" style="border-radius: 50px; font-size: 1rem;">
                                <option value="" disabled selected>Pilih Sektor</option>
                                <option value="Hero BKT (Bukittinggi)">Hero BKT (Bukittinggi)</option>
                                <option value="Hero PYK (Payakumbuh)">Hero PYK (Payakumbuh)</option>
                                <option value="Non Hero BKT">Non Hero BKT</option>
                                <option value="Hero SLK (Solok)">Hero SLK (Solok)</option>
                                <option value="Non Hero SLK">Non Hero SLK</option>
                                <option value="Hero BDT (Bandar Buat)">Hero BDT (Bandar Buat)</option>
                                <option value="Hero KJI (Kuranji)">Hero KJI (Kuranji)</option>
                                <option value="Hero PAM">Hero PAM</option>
                                <option value="Non Hero PDG">Non Hero PDG</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="Simpan" class="btn btn-success mb-4 mr-2 mt-4 btn-user btn-block" style="border-radius: 50px;">Simpan</button>
                            <a href="<?= base_url('sto'); ?>" class="btn btn-danger mb-4 mt-4 btn-user btn-block" style="border-radius: 50px;">Cancel</a>
                        </div>
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