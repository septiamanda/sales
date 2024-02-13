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
                    <h3 class="h3 mb-4 mt-5" style="color:white; font-weight: bold;">Edit Data Sentral Telepon Otomat</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('updateSTO'); ?>" method="post">
                        <input type="hidden" name="kode" value="<?= $stoModel['id']; ?>">

                        <div class="row g-3">
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Nama STO" name="NamaSTO" id="ns" style="border-radius: 50px;" value="<?= $stoModel['Nama_STO']; ?>">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="STO" name="STO" id="sto" style="border-radius: 50px;" value="<?= $stoModel['STO']; ?>">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <input type="text" class="form-control" placeholder="Hero" name="Hero" value="<?= $stoModel['Hero']; ?>" style="border-radius: 50px;">
                        </div>

                        <div class="form-group mt-4">
                            <select class="form-control" name="Sektor" style="border-radius: 50px;">
                                <option value="<?= $stoModel['Sektor']; ?>"><?= $stoModel['Sektor']; ?></option>
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
                            <button type="submit" name="Simpan" class="btn btn-success btn mb-4 mr-2 mt-4">Simpan</button>
                            <a href="<?= base_url('sto'); ?>" class="btn btn-danger btn mb-4 mt-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>