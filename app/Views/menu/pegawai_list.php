<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Tables</a></li>
    <li class="active">Managed Tables</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">DATA PEGAWAI<small class="text-capitalize"> seluruh data pegawai tirta mayang</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Data Pegawai - Perumdam Tirta Mayang Kota Jambi</h4>
                <a href="#" data-target='#modaltambah' data-toggle="modal"><span class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i>Tambah</span></a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Nik</th>
                                <th width='50px'>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>status</th>
                                <th width='70px'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            use App\Libraries\Multifungsi;

                            $no = 1;
                            foreach ($pegawai as $row) {
                                $foto = !file_exists('uploads/' . $row->NIK . '/fotoprofil/' . $row->Foto) || $row->Foto == '' || $row->Foto == Null ?  'uploads/fotoprofil/user-default.png' : 'uploads/' . $row->NIK . '/fotoprofil/' . $row->Foto;
                                echo "<tr class='clickedrow' data-id='" . $row->NIK . "'>";
                                echo "<td class='text-center'>" . $no . "</td>";
                                echo "<td>" . $row->Nama . "</td>";
                                echo "<td><div class='d-flex align-items-center' style='width: 75px; height: 100px;'>";
                                echo "<img class='imglist object-fit-cover' src='" . $foto . "'>";
                                echo "</div></td>";
                                echo "<td><a href='pegawai/detail/" . $row->NIK . "'>" . $row->NIK . "</a></td>";
                                echo "<td>" . $row->TempatLahir . "</td>";
                                echo "<td>" . Multifungsi::tampilbulanindo($row->TglLahir) . "</td>";
                                echo "<td>" . $row->Agama . "</td>";
                                echo "<td>" . $row->Alamat . "</td>";
                                echo "<td>" . $row->Aktif . "</td>";
                                echo "<td>";
                                echo "<span><a type='button' class='btn btn-success btn-icon btn-sm' href='pegawai/detail/" . $row->NIK . "'><i class='fa fa-folder-open-o fa-lg'></i></a></span> ";
                                echo "<span><a type='button' class='btn btn-info btn-icon btn-sm' href='#'><i class='fa fa-pencil fa-lg'></i></a></span> ";
                                echo "<span><a type='button' class='btn btn-danger btn-icon btn-sm' data-toggle='modal' data-target='#Del61' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>

<div id="modaltambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form role="form" action="pegawai/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" name="Nama" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">NIK</label>
                        <input type="text" class="form-control" name="NIK" value="" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Gelar Depan</label>
                                <input type="text" class="form-control" name="GelarDepan" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Gelar Belakang</label>
                                <input type="text" class="form-control" name="GelarBelakang" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No HP</label>
                        <input type="text" class="form-control" name="HP" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="TempatLahir" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tgl Lahir</label>
                        <input type="date" class="form-control" name="TglLahir" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea class="form-control" name="Alamat" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select name="KdKelamin" id="" class="form-control">
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Agama</label>
                        <select class="form-control" name="KdAgama" id="">
                            <option value="">- Pilih Agama -</option>
                            <?php
                            foreach ($agama as $row) {
                                echo "<option value='" . $row->KdAgama . "'>" . $row->Agama . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status Pegawai</label>
                        <select class="form-control" name="KdStatusPegawai" id="">
                            <option value="">- Pilih Status -</option>
                            <?php
                            foreach ($statuspegawai as $row) {
                                echo "<option value='" . $row->KdStatusPegawai . "'>" . $row->StatusPegawai . "</option>";
                            }
                            ?>
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
<style>
    table {
        overflow: auto;
    }

    /* 

    .table tbody tr {
        cursor: pointer;
    }

    .table tbody tr:hover td {
        background-color: #aeaeae;
    }
         */

    .imglist {
        max-height: 100%;
        max-width: 100%;
        width: auto;
    }

    .d-flex {
        display: flex;
    }

    .align-items-center {
        align-items: center;
    }
</style>

<script>
    $(document).ready(function() {
        TableManageDefault.init();
    });

    // $('.clickedrow').on('click', function(e) {
    //     id = $(this).data('id');
    //     link = '<?= base_url() ?>' + 'pegawai/detail/' + id;
    //     window.location = link;
    // });
</script>
<?= $this->endSection() ?>