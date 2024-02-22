<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Laporan Data</h3>
                    
                    <form action="<?= base_url('/laporan/cari') ?>" method="post">
                        <div class="form-group">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select class="form-control" name="jenis_laporan" id="jenis_laporan" placeholder="Pilih Jenis Laporan">
                                <option value="" disabled selected>Pilih Jenis Laporan</option>
                                <option value="RE">Data RE (Registrasi) </option>
                                <option value="FCC">Data FCC (Verifikasi) </option>
                                <option value="PI">Data PI (Provesioning Issues)</option>
                                <option value="PS">Data PS (Provesioning Service)</option>
                            </select>
                        </div>

                    <form action="<?= base_url('/laporan/cari') ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="cari" class="btn btn-primary btn mb-4 mr-2">Cari</button>
                            <button type="submit" name="print" class="btn btn-primary btn mb-4">Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
