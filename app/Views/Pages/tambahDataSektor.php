<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>
<style>
    .card-header {
        background-color: #DE5858;
        border-color: #DE5858;
        color: white;
    }

    .form-control {
        border-color: #DE5858;
    }

    body {
        background-color: #DE5858;
    }
</style>

<div class="container" style="max-width: 900px; margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card text-center" style="background-color: #DE5858; border-color: #DE5858;">
                <div class="card-header">
                    <h3 class="h3 mb-3 mt-4" style="color:white; font-weight: bold;">Tambah Data Sektor</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('simpan')?> " method="post" id="formTambahDataSektor">
                        <div class="form-group row mb-3">
                            <label for="datel" class="col-sm-3 col-form-label" style="color: white;">Datel</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="nama_datel" id="nama_datel" required>
                                    <option value="" disabled selected>--Pilih Datel--</option>
                                    <option value="Datel BKT">DATEL BKT</option>
                                    <option value="Datel SLK">DATEL SLK</option>
                                    <option value="Inner PDG">Inner PDG</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row margin-top: 6px"> 
                            <label for="nama-sektor" class="col-sm-3 col-form-label" style="color: white; "> Sektor</label>
                            <div class="col-sm-8 ">
                                <input type="text" class="form-control" name="nama_sektor" id="nama_sektor" placeholder="Masukkan Nama Sektor" required>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mt-3">
                            <button type="submit" name="Simpan" class="btn btn-berhasil mb-3 mr-2 mt-4" style="border-radius: 20px; width: fit-content; padding: 8px 16px; max-width: 150px;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
