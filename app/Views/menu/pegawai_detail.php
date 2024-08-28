<?php

use App\Libraries\FungsiSimpeg;
use App\Libraries\Multifungsi;

$db = \Config\Database::connect(); ?>
?>

<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/flash_data') ?>

<div class="col-md-12" style="display: flex; justify-content: space-between;">
    <h1 class="page-header">
        Profile <small>Pegawai <i class="fa fa-angle-right"></i>
            <?= $pegawai->Nama ?> <i class="fa fa-lock"></i> NIK. <?= $pegawai->NIK ?></small>
    </h1>
    <div>
        <a href="#" data-target="#modaleditpersonal" data-toggle="modal">
            <div class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i> Edit</div>
        </a>
        /
        <div id="printthispage" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> Print</div>
    </div>
</div>

<div class="col-md-10">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true"><span class="visible-xs">Profile</span><span class="hidden-xs"><i class="fa fa-book fa-lg text-primary"></i> Profile</span></a></li>
        <li class=""><a href="#si" data-toggle="tab" aria-expanded="false"><span class="visible-xs">Si</span><span class="hidden-xs"><i class="fa fa-book text-warning"></i> Suami/i</span></a></li>
        <li class=""><a href="#anak" data-toggle="tab" aria-expanded="false"><span class="visible-xs">Anak</span><span class="hidden-xs"><i class="fa fa-book fa-lg text-success"></i> Anak</span></a></li>
        <li class=""><a href="#sekolah" data-toggle="tab" aria-expanded="false"><span class="visible-xs">Pend</span><span class="hidden-xs"><i class="fa fa-graduation-cap fa-lg text-inverse"></i> Pendidikan</span></a></li>
        <li class=""><a href="#arsip" data-toggle="tab" aria-expanded="false"><span class="visible-xs">Arsip</span><span class="hidden-xs"><i class="fa fa-book fa-lg text-inverse text-warning"></i> Arsip</span></a></li>
    </ul>
    <div class="tab-content">
        <!-- nav profile -->
        <div class="tab-pane fade active in" id="profile">
            <!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image">
                            <a href="javascript:;" data-toggle="modal" data-target="#Gantifoto61" title="ganti foto">
                                <?php $foto = !file_exists('uploads/' . $pegawai->NIK . '/fotoprofil/' . $pegawai->Foto) || $pegawai->Foto == '' || $pegawai->Foto == Null ?  'uploads/fotoprofil/user-default.png' : 'uploads/' . $pegawai->NIK . '/fotoprofil/' . $pegawai->Foto; ?>
                                <img src="<?= $foto ?>" class="object-fit-scale-down" width="160" height="200"><i class="fa fa-user hide"></i> </a>
                        </div>
                        <!-- end profile-image -->
                        <div class="m-b-10">
                            <a href="javascript:;" class="btn btn-default btn-block btn-sm"><?= $pegawai->NIK ?></a>
                            <a href="#" data-target="#modaleditpersonal" data-toggle="modal" class="btn btn-warning btn-block btn-sm">Edit</a>
                        </div>
                        <br>
                        <div class="m-b-15 pull-center">
                            <h5><span class="label label-primary"> # Additional Setup </span></h5>
                        </div>
                        <div class="m-r-7 m-b-10 pull-right">
                            <span class="btn btn-default btn-sm" style="cursor: text;">Login</span>
                            <a data-toggle="modal" data-target="#Setlog61" class="btn btn-success btn-sm">
                                <span class="ion-ios-gear fa-lg"></span>
                            </a>
                        </div>
                        <div class="m-r-7 m-b-10 pull-right">
                            <span class="btn btn-default btn-sm" style="cursor: text;">Periode KGB</span>
                            <a data-toggle="modal" data-target="#Setkgb61" class="btn btn-warning btn-sm">
                                <span class="ion-ios-gear fa-lg"></span>
                            </a>
                        </div>
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h5><span class="label label-inverse pull-right"> # Biodata Pegawai </span></h5>
                                            </th>
                                            <th>
                                                <h4><?= $pegawai->GelarDepan . " " . $pegawai->Nama . " " . $pegawai->GelarBelakang ?>
                                                    <small><?= $pegawai->kdgol . " - " . $pegawai->pangkat ?></small>
                                                </h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">NIK</td>
                                            <td><?= $pegawai->NIK ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Gelar Depan</td>
                                            <td><?= $pegawai->GelarDepan ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Gelar Belakang</td>
                                            <td><?= $pegawai->GelarBelakang ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Tempat Tanggal Lahir</td>
                                            <td><i class="fa fa-map-marker fa-lg m-r-5"></i> <?= $pegawai->TempatLahir ?>, <?= Multifungsi::tampilbulanindo($pegawai->TglLahir) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Umur</td>
                                            <td><?php echo Multifungsi::umur($pegawai->TglLahir) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Jenis Kelamin</td>
                                            <td><i class="fa fa-intersex fa-lg m-r-5"></i><?= $pegawai->KdKelamin == 'L' ? 'Laki - Laki' : 'Perempuan'; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Agama</td>
                                            <td><?= $pegawai->Agama ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Golongan Darah</td>
                                            <td><?= $pegawai->GolDarah ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Status Pernikahan</td>
                                            <td>Nikah</td>
                                        </tr>
                                        <tr>
                                            <td class="field">No. HP</td>
                                            <td><i class="fa fa-mobile fa-lg m-r-5"></i><?= $pegawai->HP ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Alamat</td>
                                            <td><?= $pegawai->Alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">No. NPWP</td>
                                            <td><?= $pegawai->NPWP ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Status Kepegawaian</td>
                                            <td><?= $pegawai->StatusPegawai ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Golongan - Pangkat</td>
                                            <td><?= $pegawai->kdgol . " - " . $pegawai->pangkat ?></td>
                                        </tr>

                                        <tr>
                                            <td class="field">Jabatan</td>
                                            <td><?= $pegawai->NamaJabatan2 ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Pend. Akhir</td>
                                            <td><?= $pegawai->tingkatpendidikan ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Department</td>
                                            <td><?= $pegawai->Bagian ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="field">Jatuh Tempo Pensiun</td>
                                            <td><?= Multifungsi::tampilbulanindo($pegawai->TglPensiun) ?></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <hr>
                    <!-- end profile-right -->
                </div>
                <!-- end profile-section -->
            </div>
            <!-- end profile-container -->
        </div>
        <!-- nav pasangan -->
        <div class="tab-pane fade" id="si">
            <a data-toggle="modal" data-target="#modaltambahpasangan" title="upload arsip" class="btn btn-sm btn-success m-b-10"><i class="fa fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No.</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No Keluarga</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>Hubungan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasangan as $row) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row->Nama . "</td>";
                            echo "<td>" . $row->NIK . "</td>";
                            echo "<td>" . $row->NoKeluarga . "</td>";
                            echo "<td>" . $row->TempatLahir . "</td>";
                            echo "<td>" . date('d-M-Y', strtotime($row->TglLahir)) . "</td>";
                            echo "<td>" . FungsiSimpeg::statusKeluarga($row->KdStatusKeluarga) . "</td>";
                            echo "<td>";
                            echo "<span><a data-id='" . $row->id_keluarga . "' type='button' href='#' data-toggle='modal' data-target='#modaleditpasangan' class='btn btn-info btn-icon btn-sm' href='#'><i class='fa fa-pencil fa-lg'></i></a></span> ";
                            echo "<span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='pegawai/deletekeluarga/" . $row->id_keluarga . "' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
                            echo "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- nav anak -->
        <div class="tab-pane fade" id="anak">
            <div class="table-responsive">
                <a data-toggle="modal" data-target="#modaltambahpasangan" title="upload arsip" class="btn btn-sm btn-success m-b-10"><i class="fa fa-plus-circle"></i> Tambah</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>status</th>
                            <th width='150px'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($anak as $row) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row->Nama . "</td>";
                            echo "<td>" . $row->NIK . "</td>";
                            echo "<td>" . $row->TempatLahir . "</td>";
                            echo "<td>" . date('d-M-Y', strtotime($row->TglLahir)) . "</td>";
                            echo "<td>" . FungsiSimpeg::statusKeluarga($row->KdStatusKeluarga) . "</td>";
                            echo "<td>";
                            echo "<span><a data-id='" . $row->id_keluarga . "' type='button' href='#' data-toggle='modal' data-target='#modaleditpasangan' class='btn btn-info btn-icon btn-sm' href='#'><i class='fa fa-pencil fa-lg'></i></a></span> ";
                            echo "<span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='pegawai/deletekeluarga/" . $row->id_keluarga . "' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
                            echo "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- nav pendidikan -->
        <div class="tab-pane fade" id="sekolah">
            <a data-toggle="modal" data-target="#modaltambahpendidikan" title="upload arsip" class="btn btn-sm btn-success m-b-10"><i class="fa fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Tempat Lulus</th>
                            <th>Tahun Lulus</th>
                            <th>No Ijazah / File</th>
                            <th width='100px'>Set Akhir</th>
                            <th width='150px'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row->NamaSekolah . "</td>";
                            echo "<td>" . $row->TempatLulus . "</td>";
                            echo "<td>" . $row->TahunLulus . "</td>";
                            echo "<td>" . $row->NoIjazah . " <a href='uploads/" . $pegawai->NIK . "/pendidikan/" . $row->file . "' target='_blank' title='view'><i class='fa fa-file fa-lg'></i></a></td>";

                            if ($row->KdTingkatDidik == $pegawai->KdPendidikan) {
                                echo "<td><a><button class='btn btn-sm btn-success'><div style='font-size: 8px;'>Active</div></button></a></td>";
                            } else {
                                echo "<td><button class='btn btn-sm btn-warning setpendidikanakhir' data-pendidikan='" . $row->KdTingkatDidik . "'><div style='font-size: 8px;'>InActive</div></button></a></td>";
                            }
                            echo "<td>";
                            echo "<span><a data-id='" . $row->id . "' type='button' href='#' data-toggle='modal' data-target='#modaleditpendidikan' class='btn btn-info btn-icon btn-sm' href='#'><i class='fa fa-pencil fa-lg'></i></a></span> ";
                            if ($row->KdTingkatDidik != $pegawai->KdPendidikan) {
                                echo "<span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='Pendidikan/delete/" . $row->id . "' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
                            }
                            echo "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- nav arsip -->
        <div class="tab-pane fade" id="arsip">
            <div class="alert alert-info fade in">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                <i class="fa fa-info fa-2x pull-left"></i> Folder ini dapat digunakan untuk menyimpan arsip kepegawaian apapun ...
            </div>
            <a data-toggle="modal" data-target="#modaltambaharsip" title="upload arsip" class="btn btn-sm btn-success m-b-10"><i class="fa fa-plus-circle"></i> &nbsp;Add Arsip</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="3%">No.</th>
                            <th>Nama Arsip</th>
                            <th width="10%">File</th>
                            <th width="10%">
                                <center><i class="fa fa-code fa-lg"></i></center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($arsip as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->nama ?></td>
                                <td>
                                    <a href="<?= 'uploads/' . $row->NIK . '/arsip/' . $row->file ?>" target="_blank" title="View arsip"><i class="fa fa-file-pdf-o fa-lg text-danger"></i></a>
                                </td>
                                <td class="tools" align="center">
                                    <span><a data-id='<?= $row->id ?>' type='button' href='#' data-toggle='modal' data-target='#modaleditarsip' class='btn btn-info btn-icon btn-sm' href='#'><i class='fa fa-pencil fa-lg'></i></a></span>
                                    <span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='Arsip/delete/<?= $row->id ?>' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span>
                                </td>
                            </tr>
                        <?php }
                        $no++; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-2">
    <div class="panel panel-default overflow-hidden">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-plus-circle pull-right"></i>
                    <i class="ion-filing fa-lg text-warning"></i> &nbsp;Kepegawaian
                </a>
            </h3>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <p class="pull-right"><a type="button" data-toggle="modal" data-target="#modalberkala" class="btn btn-default"><i class="fa fa-calendar"></i> Berkala / Pangkat</a></p>
                <p class="pull-right"><a type="button" data-toggle="modal" data-target="#modaljabatan" class="btn btn-default"><i class="fa fa-star"></i> Jabatan</a></p>
            </div>
        </div>
    </div>
</div>

<div id="Gantifoto61" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-silver">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti Foto Pegawai</h4>
            </div>
            <div class="col-sm-12">
                <div class="modal-body">
                    <form action="pegawai/gantifoto" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-sm-12">
                            <label class="col-md-3 control-label">Pilih Foto</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/png,image/jpg,image/jpeg" name="foto" maxlength="255" class="form-control" required="">
                                <input type="hidden" name="NIK" value="<?= $pegawai->NIK ?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <p>* Max size 500 KB</p>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Ganti</button>&nbsp;
                                <a type="button" class="btn btn-default active" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer no-margin-top">
            </div>
        </div>
    </div>
</div>

<div id="modaleditpersonal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Edit</span> Silahkan ubah data di bawah untuk update data .</h5>
            </div>
            <form role="form" action="pegawai/updatepersonal/<?= $pegawai->NIK ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" placeholder="John" class="form-control" name="Nama" value="<?= $pegawai->Nama ?>" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Gelar Depan</label>
                                <input type="text" class="form-control" name="GelarDepan" value="<?= $pegawai->GelarDepan ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Gelar Belakang</label>
                                <input type="text" class="form-control" name="GelarBelakang" value="<?= $pegawai->GelarBelakang ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">NIK</label>
                        <input type="text" class="form-control" name="NIK" value="<?= $pegawai->NIK ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tgl Lahir</label>
                        <input type="date" class="form-control" name="TglLahir" value="<?= date('Y-m-d', strtotime($pegawai->TglLahir)) ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select name="KdKelamin" class="form-control" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option <?= $pegawai->KdKelamin == 'L' ? 'selected' : ''; ?> value="L">Laki - Laki</option>
                            <option <?= $pegawai->KdKelamin == 'P' ? 'selected' : ''; ?> value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Golongan Darah</label>
                        <select name="KdGolDarah" class="form-control" required>
                            <option value="">- Golongan Darah -</option>
                            <?php
                            foreach ($goldarah as $row) {
                                $selected = $row->KdGolDarah == $pegawai->KdGolDarah ? 'selected' : '';
                                echo "<option " . $selected . " value='" . $row->KdGolDarah . "'>" . $row->GolDarah . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Agama</label>
                        <select name="KdAgama" class="form-control" required>
                            <option value="">- Pilih Agama -</option>
                            <?php
                            foreach ($agama as $row) {
                                $selected = $row->KdAgama == $pegawai->KdAgama ? 'selected' : '';
                                echo "<option " . $selected . " value='" . $row->KdAgama . "'>" . $row->Agama . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status </label>
                        <select name="KdKawin" class="form-control" required>
                            <option value="">- Pilih Status -</option>
                            <?php
                            $kawin = $db->query("SELECT * FROM mkawin")->getResult();
                            foreach ($kawin as $row) {
                                $selected = $row->KdKawin == $pegawai->KdKawin ? 'selected' : '';
                                echo "<option " . $selected . " value='" . $row->KdKawin . "'>" . $row->Kawin . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea name="Alamat" class="form-control" rows="3" placeholder="Alamat ..."><?= $pegawai->Alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">HP</label>
                        <input type="text" name="HP" class="form-control" value="<?= $pegawai->HP ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">NPWP</label>
                        <input type="text" name="NPWP" class="form-control" value="<?= $pegawai->NPWP ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Ubah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaltambahpasangan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form role="form" action="pegawai/tambahpasangan/<?= $pegawai->NIK ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" name="Nama" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">KK</label>
                        <input type="text" class="form-control" name="NoKeluarga" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="TempatLahir" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tgl Lahir</label>
                        <input type="date" class="form-control" name="TglLahir" value="" />
                    </div>
                    <div class="form-group" id="pasangan">
                        <label class="control-label">Hubungan</label>
                        <select class="form-control" name="KdStatusKeluarga" id="" required>
                            <option value="">-Pilih Hubungan-</option>
                            <?php foreach ($statuskeluarga as $row) {
                                echo "<option value='" . $row->kdstatuskeluarga . "'>" . $row->statuskeluarga . "</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Tambah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaleditpasangan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Edit</span> Silahkan ubah adata di bawah untuk update data .</h5>
            </div>
            <form role="form" action="pegawai/proseditpasangan" method="post" enctype="multipart/form-data">
                <div class="modal-body hasileditpasangan">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Ubah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaltambahpendidikan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form action="Pendidikan/add" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Tingkat Pendidikan</label>
                        <select name="KdTingkatDidik" id="" class="form-control" required>
                            <?php foreach ($tingkatdidik as $row) {
                                echo "<option value='" . $row->kdtingkatdidik . "'>" . $row->tingkatpendidikan . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nomor Pendidikan</label>
                        <input type="text" class="form-control" name="NoPendidikan" value="" required />
                        <input type="hidden" class="form-control" name="NIK" value="<?= $pegawai->NIK ?>" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Sekolah</label>
                        <input type="text" class="form-control" name="NamaSekolah" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tempat Lulus</label>
                        <input type="text" class="form-control" name="TempatLulus" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tahun Lulus</label>
                        <input type="text" class="form-control" name="TahunLulus" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Ijazah</label>
                        <input type="text" class="form-control" name="NoIjazah" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" name="Keterangan" value="" required />
                    </div>
                    <div>
                        <label class="control-label">File</label>
                        <input accept="application/pdf" type="file" class="form-control" name="file" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Tambah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaleditpendidikan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form role="form" action="pegawai/proseditpendidikan" method="post" enctype="multipart/form-data">
                <div class="modal-body hasileditpendidikan">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Update Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalberkala" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Data Kenaikan Berkala / Pangkat</span></h5>
            </div>
            <form role="form" action="pegawai/proseditpendidikan" method="post" enctype="multipart/form-data">
                <div class="modal-body hasilberkala">

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-sm btn-green"> Update Data </button> -->
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaltambaharsip" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form role="form" action="Arsip/add" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="" />
                        <input type="hidden" class="form-control" name="NIK" value="<?= $pegawai->NIK ?>">
                    </div>
                    <div>
                        <label class="control-label">File</label>
                        <input accept="application/pdf" type="file" class="form-control" name="file" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Tambah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaleditarsip" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Edit</span> Silahkan isi data di bawah untuk update data .</h5>
            </div>
            <form role="form" action="Arsip/edit" method="post" enctype="multipart/form-data">
                <div class="modal-body hasileditarsip">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Update Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaljabatan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Data Kenaikan Jabatan</span></h5>
            </div>
            <form role="form" action="pegawai/proseditpendidikan" method="post" enctype="multipart/form-data">
                <div class="modal-body hasiljabatan">

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-sm btn-green"> Update Data </button> -->
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modaleditpasangan').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var hubungan = $(e.relatedTarget).data('hubungan');
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>' + 'pegawai/editpasangan',
            data: {
                id: id
            },
            success: function(data) {
                $('.hasileditpasangan').html(data);
            }
        })
    })

    $('#modaleditpendidikan').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?= base_url() ?>' + 'Pendidikan/modaledit',
            type: 'POST',
            data: {
                id: id
            },
            success: function($data) {
                $('.hasileditpendidikan').html($data);
            }
        })
    })

    $('#modaleditarsip').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?= base_url() ?>' + 'Arsip/modaledit',
            type: 'POST',
            data: {
                id: id
            },
            success: function($data) {
                $('.hasileditarsip').html($data);
            }
        })
    })

    $('#modalberkala').on('show.bs.modal', function(e) {
        $.ajax({
            url: '<?= base_url() ?>' + 'Berkala/modal',
            type: 'POST',
            data: {
                NIK: '<?= $pegawai->NIK ?>'
            },
            success: function($data) {
                $('.hasilberkala').html($data);
            }
        })
    })

    $('#modaljabatan').on('show.bs.modal', function(e) {
        $.ajax({
            url: '<?= base_url() ?>' + 'TrJabatan/modal',
            type: 'POST',
            data: {
                NIK: '<?= $pegawai->NIK ?>'
            },
            success: function($data) {
                $('.hasiljabatan').html($data);
            }
        })
    })

    $('.setpendidikanakhir').on('click', function(e) {
        var pendidikan = $(this).data('pendidikan');
        $.ajax({
            url: '<?= base_url() ?>' + 'Pendidikan/setpendidikanakhir',
            type: 'POST',
            data: {
                NIK: '<?= $pegawai->NIK ?>',
                KdTingkatPendidikan: pendidikan,
            },
            success: function(data) {
                if (data == 1) {
                    alert('sukses');
                    location.reload();
                } else {
                    alert('gagal');
                    location.reload();
                }
            }
        })
    })

    $('#printthispage').on('click', function() {
        window.print();
    });
</script>
<?= $this->endSection() ?>