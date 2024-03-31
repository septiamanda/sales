<?= $this->extend('Layout/navbar'); ?>

<?= $this->section('pageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profesioning Issue</h1>
        <div>
            <button class="btn btn-success ml-3" onclick="window.print()"><i class="bi bi-printer"></i> Cetak</button>
            <a href="<?= site_url('pi/export') ?>" class="btn btn-success ml-3">
                <i class="fas fa-file-download"></i> Export Excel
            </a>
        </div>
    </div>
    

    <hr>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 mb-3" style="background-color: #DE5858;">
                        <h6 class="m-0 font-weight-bold text-white">Grafik</h6>
                        <div class="col-sm-3 mt-3">
                            <input type="number" value="<?= date('Y') ?>" id="tahunPI" class="form-control" onchange="getDataSales()">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartPI"></canvas>
                        </div>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 mb-3">
                        <h6 class="m-0 font-weight-bold text-#184240">Data Profesioning Issue</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #184240; color: white; text-align: center;">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Order</th>
                                        <th>Tanggal Update</th>
                                        <th>No. SC</th>
                                        <th>Nama Pengguna</th>
                                        <th>Alamat Instalasi</th>
                                        <th>Sektor/Hero</th>
                                        <th>STO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataPI as $pi) : ?>
                                        <tr>
                                            <th scope='row'><?= $no; ?></th>
                                            <td><?= $pi['tanggal_order']; ?></td>
                                            <td><?= $pi['tanggal_update']; ?></td>
                                            <td><?= $pi['noSC']; ?></td>
                                            <td><?= $pi['nama_pengguna']; ?></td>
                                            <td><?= $pi['alamat_instl']; ?></td>
                                            <td><?= $pi['sektor']; ?></td>
                                            <td><?= $pi['sto']; ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Load jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Load Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script>
    $(document).ready(function() {
        getDataSales();
    });

    function chartPI(dataset) {
        var ctx = document.getElementById("chartPI");
        var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [{
                    label: "Jumlah",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: dataset,
                }, ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0,
                    },
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: "date",
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            maxTicksLimit: 7,
                        },
                    }, ],
                    yAxes: [{
                        ticks: {
                            stepSize: 1,
                            maxTicksLimit: 7,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2],
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: "index",
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + ": " + number_format(tooltipItem.yLabel);
                        },
                    },
                },
            },
        });
    }
    //fungsi akses data
    function getDataSales() {
        var tahun = $("#tahunPI").val();
        $.ajax({
            url: "/chartPI",
            method: "post",
            data: {
                tahun: tahun,
            },
            success: function(response) {
                var result = JSON.parse(response);
                var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                $.each(result.data, function(i, item) {
                    dataset[item.bulan - 1] = item.total;
                });
                chartPI(dataset);
            },
        });
    }
</script>

<?= $this->endSection(); ?>