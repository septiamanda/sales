<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 style="color:black" class="mb-4">Edit Data Sektor</h3>

                    <form action="<?= base_url('updateSektor'); ?>" method="post">
                        <input type="hidden" name="kode_sektor" value="<?=$modelSektor['id_sektor']; ?>">
                        <!-- Field Datel -->
                        <div class="form-group">
                            <label style="color: black" for="datel">Datel (Daerah Telkom)</label>
                            <select class="form-control" name="nama_datel" id="nama_datel">
                                <option value="<?= $modelSektor['nama_datel']; ?>"><?= $modelSektor['nama_datel']; ?></option>
                                <option value="" disabled selected>--Pilih Datel--</option>                                
                                <option value="Datel BKT (Bukittinggi)">Datel BKT (Bukittinggi)</option>
                                <option value="Datel SLK (Solok)">Datel SLK (Solok)</option>
                                <option value="Non Hero PDG (Padang)">Non Hero PDG (Padang)</option>
                            </select>
                        </div>

                        <!-- Field Nama Sektor -->
                        <div class="form-group">
                            <label style="color: black" for="nama-sektor">Nama Sektor</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama sektor"  name="nama_sektor" id="nama_sektor" value="<?= $modelSektor['nama_sektor']; ?>" required >  
                        </div>
                        
                        <!-- Field Hero Sektor -->
                        <div class="form-group">
                            <label style="color: black" for="hero-sektor" >Hero Sektor</label>
                            <input type="text" class="form-control" placeholder="Masukkan hero sektor"  name="hero_sektor" id="hero_sektor" value="<?= $modelSektor['hero_sektor']; ?>" required >
                        </div>

                        <div class="input-group mb-3 d-flex justify-content-center">
                            <button type="submit" name="simpan" id="btn-simpan" class="btn btn-primary btn mt-2 mb-1 mr-2">Update</button>
                            <a href="<?= base_url('sektor'); ?>" class="btn btn-danger btn mt-2 mb-1">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
