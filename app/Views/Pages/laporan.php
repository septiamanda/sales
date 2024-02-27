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
                    <label>Jenis Laporan :</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_Sales" value="Sales">
                        <label class="form-check-label" for="jenis_laporan_Sales">Data Sales</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_RE" value="RE">
                        <label class="form-check-label" for="jenis_laporan_RE">Data RE (Registrasi)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_FCC" value="FCC">
                        <label class="form-check-label" for="jenis_laporan_FCC">Data FCC (Verifikasi)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_PI" value="PI">
                        <label class="form-check-label" for="jenis_laporan_PI">Data PI (Provisioning Issues)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_PS" value="PS">
                        <label class="form-check-label" for="jenis_laporan_PS">Data PS (Provisioning Service)</label>
                    </div>
                </div>


                    <!-- <form action="<?= base_url('/laporan/print') ?>" method="post"> -->
                        <!-- <div class="form-group row">
                            <div class="col-md-6">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
                            </div>
                        </div> -->

                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="print" class="btn btn-primary btn m">Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
