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
            <div class="card text-center " style="background-color: #DE5858; border-color: #DE5858;">
                <div class="card-header">
                    <h3 class="h3 mb-4 mt-5" style="color:white; font-weight: bold;">Edit Data STO</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('updateSTO'); ?>" method="post">
                        <input type="hidden" name="kode" value="<?= $stoModel['id']; ?>">

                        <div class="form-group">
                            <select type="text" class="form-control" placeholder="Datel" name="Datel" id="datel" style="border-radius: 50px; height: 50px;">
                                <option value="" disabled selected>Pilih Datel</option>
                                <?php foreach ($datels as $datel) : ?>
                                    <?php if ($stoModel['Datel'] == $datel['nama_datel']) : ?>
                                        <option value="<?= esc($datel['nama_datel']); ?>" selected><?= esc($datel['nama_datel']); ?></option>
                                    <?php else : ?>
                                        <option value="<?= esc($datel['nama_datel']); ?>"><?= esc($datel['nama_datel']); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <select class="form-control" name="Sektor" id="sektor" style="border-radius: 50px; height: 50px;">
                                <option value="" disabled selected>Pilih Sektor</option>
                                <?php foreach ($sektors as $sektor) : ?>
                                    <?php if ($stoModel['Sektor'] == $sektor['nama_sektor']) : ?>
                                        <option value="<?= esc($sektor['nama_sektor']); ?>" selected><?= esc($sektor['nama_sektor']); ?></option>
                                    <?php else : ?>
                                        <option value="<?= esc($sektor['nama_sektor']); ?>"><?= esc($sektor['nama_sektor']); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <input type="text" class="form-control" placeholder="STO" name="STO" id="sto" style="border-radius: 50px; height: 50px;" value="<?= $stoModel['STO']; ?>">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="Simpan" class="btn btn-berhasil mb-4 mr-2 mt-4 btn-user btn-block" style="border-radius: 50px;">Simpan</button>
                            <a href="<?= base_url('sto'); ?>" class="btn btn-warning btn mb-4 btn-user btn-block" style="border-radius: 50px; margin-top: -15px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>