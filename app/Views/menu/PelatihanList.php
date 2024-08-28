<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/flash_data') ?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Tables</a></li>
    <li class="active">Managed Tables</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">DATA Pelatihan Pegawai<small class="text-capitalize"> Master Pelatihan</small></h1>
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
                <h4 class="panel-title">Data Pelatihan - Perumdam Tirta Mayang Kota Jambi</h4>
                <a href="#" data-target='#modaltambah' data-toggle="modal"><span class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</span></a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width='25px'>NO</th>
                                <th>Pegawai</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tempat</th>
                                <th>Tgl Lama</th>
                                <th>Tgl Mulai - Akhir</th>
                                <th>Penyelenggara</th>
                                <th>File</th>
                                <th width='70px'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($Pelatihan as $row) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $no . "</td>";
                                echo "<td>" . $row->Nama . "</td>";
                                echo "<td>" . $row->NamaPelatihan . "</td>";
                                echo "<td>" . $row->NamaPelatihan . "</td>";
                                echo "<td>" . $row->TempatPelatihan . "</td>";
                                echo "<td>" . $row->TglPelatihan . "</td>";
                                echo "<td>" . $row->TglMulai . " s/d " . $row->TglSelesai . "</td>";
                                echo "<td>" . $row->Penyelenggara . "</td>";
                                echo "<td> <a href='uploads/" . $row->NIK . "/pelatihan/" . $row->file . "' target='_blank' title='view'><i class='fa fa-file fa-lg'></i></a></td>";
                                echo "<td>";
                                echo "<span><a data-id='" . $row->id . "' data-toggle='modal' data-target='#modaledit' class='btn btn-info btn-icon btn-sm' ><i class='fa fa-pencil fa-lg'></i></a></span> ";
                                echo "<span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='Pelatihan/delete/" . $row->id . "' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
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
            <form role="form" action="Pelatihan/add" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Pegawai</label>
                        <input type="text" class="form-control" id="search-pegawai" value="" required autocomplete="off" />
                        <div class="position-absolute w-100" style="z-index: 10;" id="suggesstion-box"></div>
                        <div id="showhere" class="d-block">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tingkat Pelatihan</label>
                        <select name="KdJenisPelatihan" id="" class="form-control">
                            <?php foreach ($jenispelatihan as $row) {
                                echo "<option value='" . $row->KdJenisPelatihan . "'>" . $row->JenisPelatihan . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nomor Pelatihan</label>
                        <input type="text" class="form-control" name="NoPelatihan" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Pelatihan</label>
                        <input type="text" class="form-control" name="NamaPelatihan" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tempat Pelatihan</label>
                        <input type="text" class="form-control" name="TempatPelatihan" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tgl Mulai</label>
                        <input type="date" class="form-control" name="TglMulai" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tgl Selesai</label>
                        <input type="date" class="form-control" name="TglSelesai" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Penyelenggara</label>
                        <input type="text" class="form-control" name="Penyelenggara" value="" required />
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

<div id="modaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Edit</span> Silahkan isi data di bawah untuk update data .</h5>
            </div>
            <form role="form" action="Pelatihan/edit" method="post" enctype="multipart/form-data">
                <div class="modal-body hasiledit">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Edit Data </button>
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

    .autocomplete {
        background-color: #8294C4;
        color: white;
    }

    .autocomplete {
        font-weight: bold;
    }

    .autocomplete li {
        padding: 5px !important;
    }

    .autocomplete li:hover,
    .autocomplete ul:hover {
        background-color: #F8F6F4;
        color: black;
    }

    .autocomplete_parent ul {
        list-style-type: none;
    }

    .autocomplete_parent ul {
        padding: 0;
    }

    .textautocomplete {
        margin: 15px;
    }
</style>

<script>
    $(document).ready(function() {
        TableManageDefault.init();

        $('#file-input').change(function() {
            var file = this.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();

            if (fileExtension !== 'pdf') {
                alert('Please upload a PDF file.');
                this.value = ''; // Clear the file input
                return false;
            }
        });
    });

    $('#modaledit').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?= base_url('Pelatihan/modaledit') ?>',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                $('.hasiledit').html(data);
            }
        })
    });

    // autocomplete pegawai start
    $("#search-pegawai").keyup(function() {
        $.ajax({
            type: "POST",
            url: "pegawai/autocomplete",
            data: {
                nama: $(this).val(),
                func: 'autocomplete'
            },
            success: function(data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
            }
        });
    });

    function autocomplete(nik, nama) {
        var html = `    <div class="row">
                            <div class="col-md-6">
                                <input name="NIK" class="form-control" value="` + nik + `" readonly >
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" value="` + nama + `" readonly >
                            </div>
                        </div>
                    `;
        $("#showhere").html(html);
        $("#suggesstion-box").hide();
        $("#search-pegawai").val(nama)
    }
    // autocomplete pegawai end
</script>
<?= $this->endSection() ?>