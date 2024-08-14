<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/flash_data') ?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">
    Dashboard <small>Selamat datang di halaman dashboard SIMPEG Tirta Mayang Kota Jambi</small>
</h1>
<!-- end page-header -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Panel Title here</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-white text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-blue"><i class="ion-ios-personadd"></i></div>
            <div class="stats-title">PEGAWAI AKTIF</div>
            <div class="stats-number"><?= $pegawai_aktif ?></div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 90%;"></div>
            </div>
            <div class="stats-desc">Total Data Pegawai <b>Aktif</b></div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-white text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-pink"><i class="ion-ios-navigate"></i></div>
            <div class="stats-title">DEPARTMENT</div>
            <div class="stats-number"><?= $bagian_aktif ?></div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 90%;"></div>
            </div>
            <div class="stats-desc">Total Data Departmen / Bagian / Unit Kerja</div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-white text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-orange"><i class="ion-ios-timer"></i></div>
            <div class="stats-title">DIKLAT</div>
            <div class="stats-number">7</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 90%;"></div>
            </div>
            <div class="stats-desc">Total Data Diklat</div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <!-- <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-white text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-green"><i class="ion-ios-star"></i></div>
            <div class="stats-title">PENGHARGAAN</div>
            <div class="stats-number">6</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 90%;"></div>
            </div>
            <div class="stats-desc">Total Data Penghargaan</div>
        </div>
    </div> -->
    <!-- end col-3 -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Berdasarkan Department</h4>
            </div>
            <div class="panel-body chartcontainer">
                <canvas id="chartdepartment"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Per Golongan</h4>
            </div>
            <div class="panel-body chartcontainer">
                <canvas id="chartgol"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Per Status</h4>
            </div>
            <div class="panel-body chartcontainer">
                <canvas id="chartstatus"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Pensiun Tahun Ini</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tgl Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $pensiuntahunini = array_filter($pegawaipensiun, function ($employee) {
                                return $employee->usia == 56;
                            });
                            foreach ($pensiuntahunini as $row) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row->Nama . "</td>";
                                echo "<td>" . $row->NIK . "</td>";
                                echo "<td>" . $row->tgllahir . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Pensiun Tahun Depan</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tgl Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $pensiuntahundepan = array_filter($pegawaipensiun, function ($employee) {
                                return $employee->usia == 55;
                            });
                            foreach ($pensiuntahundepan as $row) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row->Nama . "</td>";
                                echo "<td>" . $row->NIK . "</td>";
                                echo "<td>" . $row->tgllahir . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Berkala Tahun Ini</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tgl Terakhir Berkala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            foreach ($berkala as $row) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row->Nama . "</td>";
                                echo "<td>" . $row->NIK . "</td>";
                                echo "<td>" . $row->terakhirberkala . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Pegawai Berdasarkan Tingkat Pendidikan</h4>
            </div>
            <div class="panel-body chartcontainer">
                <canvas id="chartpendidikan"></canvas>
            </div>
        </div>
    </div>
</div>
<style>
    .chartcontainer {
        height: 300px;
    }
</style>
<script src="template/js/myjs.js"></script>
<script>
    const chartdepartment = document.getElementById('chartdepartment');
    const chartgol = document.getElementById('chartgol');
    const chartstatus = document.getElementById('chartstatus');

    var pegawaiByDepartment = <?= json_encode($pegawaiByDepartment) ?>;
    var pegawaiByPendidikan = <?= json_encode($pegawaiByPendidikan) ?>;
    var pegawaiByGol = <?= json_encode($pegawaiByGol) ?>;
    var pegawaiByStatus = <?= json_encode($pegawaiByStatus) ?>;

    const colors = [
        'rgba(173, 216, 230, 1)', // Light Blue (Serene Sky)
        'rgba(255, 204, 229, 1)', // Soft Pink (Blush Rose)
        'rgba(255, 255, 153, 1)', // Pale Yellow (Lemon Drop)
        'rgba(173, 216, 230, 1)', // Light Blue (Seafoam Dreams)
        'rgba(255, 159, 168, 1)', // Pastel Red (Muted Rainbow)
        'rgba(204, 153, 204, 1)', // Lilac (Lilac Lane)
        'rgba(144, 238, 144, 1)', // Mint Green (Mint Chocolate Chip)
        'rgba(255, 229, 180, 1)', // Peach (Peach Paradise)
        'rgba(221, 221, 221, 1)', // Light Gray (Misty Morning)
        'rgba(255, 192, 203, 1)', // Pastel Pink (Watermelon Sugar)
        'rgba(230, 224, 250, 1)', // Lavender (Lavender Fields)
        'rgba(176, 224, 230, 1)', // Seafoam Green (Eucalyptus Grove)
        'rgba(255, 229, 180, 1)', // Peach (Golden Hour)
        'rgba(244, 194, 194, 1)', // Dusty Rose
        'rgba(255, 255, 204, 1)', // Light Yellow (variant)
        'rgba(198, 232, 207, 1)', // Light Green (variant)
        'rgba(238, 232, 217, 1)', // Sandy Beige (variant)
        'rgba(255, 187, 120, 1)', // Pastel Orange (variant)
        'rgba(100, 181, 242, 1)', // Pastel Blue (variant)
        'rgba(93, 71, 138, 1)', // Pastel Indigo (variant)
    ];

    const DataPegawaiByDepartment = pegawaiByDepartment.map((obj, index) => {
        const {
            Bagian,
            jumlahPegawai
        } = obj;
        return {
            label: [Bagian],
            data: [jumlahPegawai],
            borderWidth: 1,
            backgroundColor: colors[index],
        };
    });

    const DataPegawaiByPendidikan = pegawaiByPendidikan.map((obj, index) => {
        const {
            tingkatpendidikan,
            jumlahPegawai
        } = obj;
        return {
            label: [tingkatpendidikan],
            data: [jumlahPegawai],
            borderWidth: 1,
            backgroundColor: colors[index],
        };
    });

    const DataPegawaiByGol = pegawaiByGol.map((obj, index) => {
        const {
            kdgol,
            jumlahPegawai
        } = obj;
        return {
            label: [kdgol],
            data: [jumlahPegawai],
            borderWidth: 1,
            backgroundColor: colors[index],
        };
    });

    const DataPegawaiByStatus = pegawaiByStatus.map((obj, index) => {
        // Destructure with new key name
        const {
            StatusPegawai,
            jumlahPegawai
        } = obj;
        // Spread with renamed key
        return {
            label: [StatusPegawai],
            data: [jumlahPegawai],
            borderWidth: 1,
            backgroundColor: colors[index],
        };
    });

    var colorset = [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
    ];

    initChart('bar', chartdepartment, DataPegawaiByDepartment, 'Statistik Jumlah Pegawai Berdasarkan Department');
    initChart('bar', chartpendidikan, DataPegawaiByPendidikan, 'Statistik Jumlah Pegawai Berdasarkan Pendidikan');
    initChart('bar', chartgol, DataPegawaiByGol, 'Statistik Jumlah Pegawai Berdasarkan Golongan');
    initChart('bar', chartstatus, DataPegawaiByStatus, 'Statistik Jumlah Pegawai Berdasarkan Status');
</script>

<?= $this->endSection() ?>