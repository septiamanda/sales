<?= $this->extend('Layout/navbar'); ?>
<?= $this->section('pageContent'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Laporan Data</h3>
                    
                    <form id="laporanForm" action="#" >
                    <div class="form-group">
                    <label>Jenis Laporan :</label><br>
                        <div class="form-check" style="margin-bottom: 5px;">
                            <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_Sales" value="Sales">
                            <label class="form-check-label" for="jenis_laporan_Sales">Data Sales</label>
                        </div>
                        <div class="form-check" style="margin-bottom: 5px;">
                            <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_RE" value="RE">
                            <label class="form-check-label" for="jenis_laporan_RE">Data RE (Registrasi)</label>
                        </div>
                        <div class="form-check" style="margin-bottom: 5px;">
                            <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_FCC" value="FCC">
                            <label class="form-check-label" for="jenis_laporan_FCC">Data FCC (Verifikasi)</label>
                        </div>
                        <div class="form-check" style="margin-bottom: 5px;">
                            <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_PI" value="PI">
                            <label class="form-check-label" for="jenis_laporan_PI">Data PI (Provisioning Issues)</label>
                        </div>
                        <div class="form-check" style="margin-bottom: 5px;">
                            <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan_PS" value="PS">
                            <label class="form-check-label" for="jenis_laporan_PS">Data PS (Provisioning Service)</label>
                        </div>

                </div>

                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-success ml-2" onclick="window.print()"><i class="bi bi-printer"></i> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#laporanForm').submit(function(e) {
        e.preventDefault();
        var jenisLaporan = $("input[name='jenis_laporan']:checked").val();
        if (jenisLaporan) {
            // Lakukan sesuatu berdasarkan jenis laporan yang dipilih
            switch (jenisLaporan) {
                case 'Sales':
                    // Lakukan permintaan AJAX untuk mendapatkan semua data Sales
                    $.ajax({
                        url: 'SALES', 
                        method: 'GET',
                        success: function(response) {
                            // Buat tabel dengan kolom yang sesuai dan masukkan data
                            var dataSales = response.data; // Anggap respons berisi data sales
                            // Buat tabel dan masukkan data
                            var table = '<table>';
                            table += '<thead><tr><th>No.</th><th>Tanggal Order</th><th>Tanggal Update</th><th>Nomor SC</th><th>Nama Pengguna</th><th>Alamat Instalasi</th><th>Sektor</th><th>STO</th><th>Status</th></tr></thead>';
                            table += '<tbody>';
                            for (var i = 0; i < dataSales.length; i++) {
                                table += '<tr>';
                                table += '<td>' + (i + 1) + '</td>';
                                table += '<td>' + dataSales[i].tanggal_order + '</td>';
                                table += '<td>' + dataSales[i].tanggal_update + '</td>';
                                table += '<td>' + dataSales[i].noSC + '</td>';
                                table += '<td>' + dataSales[i].nama_pengguna + '</td>';
                                table += '<td>' + dataSales[i].alamat_instl + '</td>';
                                table += '<td>' + dataSales[i].sektor + '</td>';
                                table += '<td>' + dataSales[i].sto + '</td>';
                                table += '<td>' + dataSales[i].status + '</td>';
                                table += '</tr>';
                            }
                            table += '</tbody></table>';
                            // Tampilkan tabel di halaman atau cetak langsung
                            $('body').append(table);
                            window.print(); // Panggil fungsi cetak bawaan browser
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                    break;
                case 'RE':
                    // Lakukan permintaan AJAX untuk mendapatkan data dengan status RE
                    $.ajax({
                        url: 'SALES', 
                        method: 'GET',
                        success: function(response) {
                            var dataSales = response.data.filter(function(item) {
                                return item.status === 'RE';
                            });
                            // Buat tabel dan masukkan data
                            var table = '<table>';
                            // Sama seperti sebelumnya, tetapi hanya menampilkan data dengan status RE
                            // Tampilkan tabel di halaman atau cetak langsung
                            $('body').append(table);
                            window.print(); // Panggil fungsi cetak bawaan browser
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                    break;
                case 'FCC':
                    // Lakukan permintaan AJAX untuk mendapatkan data dengan status FCC
                    $.ajax({
                        url: 'SALES', 
                        method: 'GET',
                        success: function(response) {
                            var dataSales = response.data.filter(function(item) {
                                return item.status === 'FCC';
                            });
                            // Buat tabel dan masukkan data
                            var table = '<table>';
                            // Sama seperti sebelumnya, tetapi hanya menampilkan data dengan status FCC
                            // Tampilkan tabel di halaman atau cetak langsung
                            $('body').append(table);
                            window.print(); // Panggil fungsi cetak bawaan browser
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                    break;
                case 'PI':
                    // Lakukan permintaan AJAX untuk mendapatkan data dengan status PI
                    $.ajax({
                        url: 'SALES', 
                        method: 'GET',
                        success: function(response) {
                            var dataSales = response.data.filter(function(item) {
                                return item.status === 'PI';
                            });
                            // Buat tabel dan masukkan data
                            var table = '<table>';
                            // Sama seperti sebelumnya, tetapi hanya menampilkan data dengan status PI
                            // Tampilkan tabel di halaman atau cetak langsung
                            $('body').append(table);
                            window.print(); // Panggil fungsi cetak bawaan browser
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                    break;
                case 'PS':
                    // Lakukan permintaan AJAX untuk mendapatkan data dengan status PS
                    $.ajax({
                        url: 'SALES', 
                        method: 'GET',
                        success: function(response) {
                            var dataSales = response.data.filter(function(item) {
                                return item.status === 'PS';
                            });
                            // Buat tabel dan masukkan data
                            var table = '<table>';
                            // Sama seperti sebelumnya, tetapi hanya menampilkan data dengan status PS
                            // Tampilkan tabel di halaman atau cetak langsung
                            $('body').append(table);
                            window.print(); // Panggil fungsi cetak bawaan browser
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                    break;
            }
        } else {
            alert('Pilih jenis laporan terlebih dahulu!');
        }
    });
});
</script>


<?= $this->endSection(); ?>
