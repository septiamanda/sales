
<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container" style="max-width: 800px;">
    <div class ="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Tambah Data Sektor</h3>

                    <form action="<?= base_url('simpan')?> " method="post" id="formTambahDataSektor">
                        <div class="form-group">
                            <label style="color: black" for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="nama_datel" id="nama_datel" required>
                                <option value="" disabled selected>--Pilih Datel--</option>
                                <option value="Datel BKT (Bukittinggi)">Datel BKT (Bukittinggi)</option>
                                <option value="Datel SLK (Solok)">Datel SLK (Solok)</option>
                                <option value="Inner PDG (Padang)">Inner PDG (Padang)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="color: black" for="nama-sektor">Nama Sektor</label>
                            <input type="text" class="form-control" name="nama_sektor" id="nama_sektor" required>
                        </div>

                        <div class="form-group mb-4">
                            <label style="color: black" for="hero_sektor">Hero Sektor</label>
                            <input type="text" class="form-control" name="hero_sektor" id="hero_sektor" required>
                        </div>

                        <div class="input-group d-flex justify-content-center">
                            <button id="btn-simpan" type="submit" value="Simpan" name="simpan" class="btn btn-success btn mb-4 mr-4">Simpan</button>
                            <a href="<?=base_url('sektor')?>" class="btn btn-danger btn mb-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
