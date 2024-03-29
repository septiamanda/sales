<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<style>
    .card-header {
        background-color: #DE5858;
        border-color: #DE5858;
        color: white;
        text-align: center;
    }

    .form-control {
        border-color: #DE5858;
    }

    body {
        background-color: #DE5858;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card text-center" style="background-color: #DE5858; border-color: #DE5858;">
                <div class="card-header">
                    <h3 class="h3 mb-4 mt-5" style="color:white; font-weight: bold;">Edit Data STO</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('updateSTO'); ?>" method="post">
                        <input type="hidden" name="kode" value="<?= $stoModel['id']; ?>">

                        <div class="form-group">
                            <select type="text" class="form-control" placeholder="Datel" name="Datel" value="<?= $stoModel['Datel']; ?>" style="border-radius: 50px; height: 50px;;">
                                <option value="" disabled selected>Pilih Datel</option>
                                <option value="DATEL BKT">DATEL BKT</option>
                                <option value="DATEL SLK">DATEL SLK</option>
                                <option value="Inner PDG">Inner PDG</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <select class="form-control" name="Sektor" style="border-radius: 50px; height: 50px;;">
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

                        <div class="form-group mt-4">
                            <input type="text" class="form-control" placeholder="STO" name="STO" id="sto" style="border-radius: 50px; height: 50px;;" value="<?= $stoModel['STO']; ?>">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="Simpan" class="btn btn-berhasil btn mb-4 mr-2 mt-4 btn-user btn-block" style="border-radius: 50px; font-size: 1rem;">Simpan</button>
                            <a href="<?= base_url('sto'); ?>" class="btn btn-warning btn mb-4 btn-user btn-block" style="border-radius: 50px; font-size: 1rem; margin-top: -15px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>