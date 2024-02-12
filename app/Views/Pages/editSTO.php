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
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Edit Data Sentral Telepon Otomat</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('updateSTO'); ?>" method="post">
                        <input type="hidden" name="kode" value="<?= $stoModel['id']; ?>">

                        <div class="form-group">
                            <label for="pj">Nama STO</label>
                            <input type="text" class="form-control" name="NamaSTO" value="<?= $stoModel['Nama_STO']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="pj">STO</label>
                            <input type="text" class="form-control" name="STO" value="<?= $stoModel['STO']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="pj">Hero</label>
                            <input type="text" class="form-control" name="Hero" value="<?= $stoModel['Hero']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Sektor">Sektor</label>
                            <select class="form-control" name="Sektor">
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
                            <button type="submit" name="Simpan" class="btn btn-success btn mb-4 mr-2">Simpan</button>
                            <a href="<?= base_url('sto'); ?>" class="btn btn-danger btn mb-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>